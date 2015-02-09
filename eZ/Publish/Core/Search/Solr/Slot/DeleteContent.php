<?php
/**
 * File containing the Solr\Slot\DeleteContent class
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Search\Solr\Slot;

use eZ\Publish\Core\SignalSlot\Signal;
use eZ\Publish\Core\Search\Solr\Slot;

/**
 * A Solr slot handling DeleteContentSignal.
 */
class DeleteContent extends Slot
{
    /**
     * Receive the given $signal and react on it
     *
     * @param \eZ\Publish\Core\SignalSlot\Signal $signal
     */
    public function receive( Signal $signal )
    {
        if ( !$signal instanceof Signal\ContentService\DeleteContentSignal )
            return;

        // Delete Content
        $this->searchHandler->contentSearchHandler()->deleteContent( $signal->contentId );

        // Delete all Content locations
        $this->searchHandler->locationSearchHandler()->deleteContent( $signal->contentId );
    }
}