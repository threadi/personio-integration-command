import { useCommandLoader } from '@wordpress/commands';
import { page } from '@wordpress/icons';
import { useSelect } from '@wordpress/data';
import { useMemo } from '@wordpress/element';
import { addQueryArgs } from '@wordpress/url';

const icons = {
  page,
};

function usePageSearchCommandLoader( { search } ) {
  // Retrieve the pages for the "search" term.
  const { records, isLoading } = useSelect( ( select ) => {
    const { getEntityRecords } = select( 'core' );
    const query = {
      search: !! search ? search : undefined,
      per_page: 10,
      orderby: search ? 'relevance' : 'date',
    };
    return {
      records: getEntityRecords( 'postType', 'personioposition', query ),
      isLoading: ! select( 'core' ).hasFinishedResolution(
        'getEntityRecords',
        'postType', 'page', query
  ),
  };
  }, [ search ] );

  // Create the commands.
  const commands = useMemo( () => {
    return ( records ?? [] ).slice( 0, 10 ).map( ( record ) => {
      let postType = 'page';
      return {
        name: record.title?.rendered + ' ' + record.id,
        label: record.title?.rendered
          ? record.title?.rendered
          : __( '(no title)' ),
        icon: icons[ postType ],
        callback: ( { close } ) => {
          const args = {
            postType,
            postId: record.id
          };
          document.location = addQueryArgs( 'post.php', args );
          close();
        },
      };
    } );
  }, [ records, history ] );

  return {
    commands,
    isLoading,
  };
}

useCommandLoader( {
  name: 'personio-integration-commands/position-search',
  hook: usePageSearchCommandLoader,
} );
