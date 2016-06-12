### View configuration
The following configuration will:
- Run the LocationChildren query with the parentLocationId parameter set to the current location's ID
- Map query results to the `children` variable

```
ezpublish:
    system:
        site:
            location_view:
                full:
                    folder:
                        match:
                            Identifier\ContentType: 'folder'
                        controller: ez_query:locationQueryAction
                        template: 'root_children.html.twig'
                        params:
                            query: 'LocationChildren'
                            queryParameters:
                                parentLocationId: '@=location.id'
                            variable: 'children'
```

### QueryType

`src/AppBundle/QueryType/LocationChildrenQueryType`:

```
<?php`
/**
 * This file is part of the ezplatform package.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace AppBundle\QueryType;


use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ParentLocationId;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Subtree;
use eZ\Publish\Core\QueryType\QueryType;

class LocationChildrenQueryType implements QueryType
{
    /**
     * Builds and returns the Query object.
     *
     * @param array $parameters A hash of parameters that will be used to build the Query
     *
     * @return \eZ\Publish\API\Repository\Values\Content\Query
     */
    public function getQuery(array $parameters = [])
    {
        return new LocationQuery([
            'filter' => new ParentLocationId($parameters['parentLocationId']),
        ]);
    }

    /**
     * Returns an array listing the parameters supported by the QueryType.
     *
     * @return array
     */
    public function getSupportedParameters()
    {
        return ['parentLocationId'];
    }

    /**
     * Returns the QueryType name.
     *
     * @return string
     */
    public static function getName()
    {
        return 'LocationChildren';
    }
}
``
