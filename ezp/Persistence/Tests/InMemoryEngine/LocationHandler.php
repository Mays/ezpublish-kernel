<?php
/**
 * File containing the LocationHandler implementation
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package ezp
 * @subpackage persistence_tests
 * @version //autogentag//
 *
 */

namespace ezp\Persistence\Tests\InMemoryEngine;

/**
 * @see \ezp\Persistence\Content\Interfaces\LocationHandler
 *
 * @package ezp
 * @subpackage persistence_tests
 * @version //autogentag//
 */
class LocationHandler implements \ezp\Persistence\Content\Interfaces\LocationHandler
{
    /**
     * @var RepositoryHandler
     */
    protected $handler;

    /**
     * @var Backend
     */
    protected $backend;

    /**
     * Setups current handler instance with reference to RepositoryHandler object that created it.
     *
     * @param RepositoryHandler $handler
     * @param Backend $backend The storage engine backend
     */
    public function __construct( RepositoryHandler $handler, Backend $backend )
    {
        $this->handler = $handler;
        $this->backend = $backend;
    }

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function load( $locationId )
    {
        return $this->backend->load( 'Content\\Location', $locationId );
    }

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function copy( $sourceId, $destinationId ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function move( $sourceId, $destinationId ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function hide( $id ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function unHide( $id ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function swap( $locationId1, $locationId2 )
    {
        $location1 = $this->backend->load( 'Content\\Location', $locationId1 );
        $location2 = $this->backend->load( 'Content\\Location', $locationId2 );
        $this->backend->update( 'Content\\Location', $locationId1, array( 'contentId' => $location2->contentId ) );
        $this->backend->update( 'Content\\Location', $locationId2, array( 'contentId' => $location1->contentId ) );
    }

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function update( \ezp\Persistence\Content\Location $location )
    {
        return $this->backend->update( 'Content\\Location', $location->id, (array) $location );
    }

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function createLocation( $contentId, $parentId )
    {
        //return $this->backend->create( 'Content\\Location', array(  ) );
    }

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function delete( $id ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function removeSubtree( $locationId ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function storeUrlAliasPath( $path, $locationId, $languageName = null, $alwaysAvailable = false ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function createCustomUrlAlias( $alias, $locationId, $forwarding = false, $languageName = null, $alwaysAvailable = false ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function createUrlHistoryEntry( $historicUrl, $locationId ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function listUrlsForLocation( $locationId, $urlType ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function removeUrlsForLocation( $locationId, array $urlIdentifier ){}

    /**
     * @see \ezp\Persistence\Content\Interfaces\LocationHandler
     */
    public function getPath( $locationId, $languageCode ){}
}
?>
