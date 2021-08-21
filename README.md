# Client-Laudis
Wrapper client for using laudis/neo4j-php-client with Delphi

# Usage
```php
$laudis = new \Laudis\Neo4j\Client(...);
$client = new \delphi\ORM\Client\Laudis\ClientProxy($laudis);

$client->run($query, $parameters);
```
