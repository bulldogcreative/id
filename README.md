# id

[![Build Status](https://travis-ci.org/bulldogcreative/id.svg?branch=master)](https://travis-ci.org/bulldogcreative/id)
![PHP 7.2+](https://img.shields.io/badge/requires-php%207.2%2B-blue.svg)

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
