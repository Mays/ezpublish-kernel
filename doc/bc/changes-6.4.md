# Backwards compatibility changes

Changes affecting version compatibility with former or future versions.

## Changes

* Internal class `LocationAwareStore` has been renamed to `TagAwareStore` to reflect that it now
  supports first and foremost `X-Cache-Tags` header and multi tagging. This means a few things:
  - Tags are now longer, so make sure to not clear more then about 50 at a time as header limit is 7500 bytes
  - `X-Location-Id` is still supported internally, but it will be stored in the new disk format
  - `LOCATION_CACHE_DIR` and `LOCATION_STALE_CACHE_DIR` and related functionality is gone as tags are used instead
  - See `doc/specifications/cache/multi_tagging.md` for further details.

* Smart cache clearing is currently disabled, and might come back in form where it generate tags to clear,
  and not full lists of all affected location id's like today.
  On content updates parent, siblings, children are now cleared by `doc/specifications/cache/multi_tagging.md`
  further work needed for relations and more.

## Deprecations

* `X-Location-Id`, is deprecated in 6.4 in favour of `X-Cache-Tags`.


## Removed features

* `X-Group-Location-Id`, was deprecated in 5.4 in favour of just `X-Location-Id`, has been removed.
