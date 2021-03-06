# id

[![Build Status](https://travis-ci.org/bulldogcreative/id.svg?branch=master)](https://travis-ci.org/bulldogcreative/id)
![PHP 7.2+](https://img.shields.io/badge/requires-php%207.2%2B-blue.svg)
[![PHP version](https://badge.fury.io/ph/bulldog%2Fid.svg)](https://badge.fury.io/ph/bulldog%2Fid)

A library for generating IDs.

## Object ID

If your Object ID is long enough, it can be generated on multiple systems, without
worrying about a collision. Using time-based buckets gives us locality for each
new ID.

The first half of the ID is a bucket. The bucket is the difference between two
unix timestamps. The first timestamp is the beginning of the current year, and
the second timestamp is when the method is called. This is more efficient than
only using the current timestamp. We will end up with more buckets this way.

The second half of the ID uses the `random_bytes` function. It is then safely
encoded using base 64. We strip away any characters that are unsafe for URLs.

### Usage

The example below generates 5,000 Object IDs.

```php
<?php

require 'vendor/autoload.php';

use Bulldog\id\ObjectId;

$id = new ObjectId;

for($i=0; $i<5000; $i++) {
    var_dump($id->get(12));
}
```

## Incremental ID

You can use multiple IDs to create a base64 encoded incremental ID. You may want
to use the user's ID and another primary key from a relational database to create
a unique incremental ID.

### Usage

The example below will generate the same string each time.

```php
<?php

require 'vendor/autoload.php';

use Bulldog\id\IncrementalId;

$id = new IncrementalId;

var_dump($id->create(4, 'dog', 9));
// Output: NAZG9nOQ

var_dump($id->get(4));
// Output: NAZG
```
