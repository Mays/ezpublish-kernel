<?php
/**
 * File containing DomainObject interface
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Base\Interfaces;

/**
 * Interface for domain objects
 *
 */
interface Model
{
    /**
     * Returns an instance of the desired object, initialized from $state.
     *
     * This method must return a new instance of the class it is implemented in,
     * which has its properties set from the given $state array independent of visibility.
     *
     * @internal
     * @param array $state
     * @return Model
     */
    public static function __set_state( array $state );
}
?>
