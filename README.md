# Brighte SDK
[![Software license][ico-license]](README.md)
[![Version][ico-version-stable]][link-packagist]
[![Download][ico-downloads-monthly]][link-downloads]
[![Build status][ico-travis]][link-travis]
[![Coverage][ico-codecov]][link-codecov]

[ico-license]: https://img.shields.io/github/license/nrk/predis.svg?style=flat-square
[ico-version-stable]: https://img.shields.io/packagist/v/brightecapital/brighte-sdk.svg
[ico-downloads-monthly]: https://img.shields.io/packagist/dm/brightecapital/brighte-sdk.svg
[ico-travis]: https://travis-ci.com/brighte-capital/brighte-sdk.svg?branch=master
[ico-codecov]: https://codecov.io/gh/brighte-capital/brighte-sdk/branch/master/graph/badge.svg

[link-packagist]: https://packagist.org/packages/brightecapital/brighte-sdk
[link-codecov]: https://codecov.io/gh/brighte-capital/brighte-sdk
[link-travis]: https://travis-ci.com/brighte-capital/brighte-sdk
[link-downloads]: https://packagist.org/packages/brightecapital/brighte-sdk/stats

### Brighte SDK includes two section
#### 1. Infrastructure: A collection of tools that allow to easily configure and create objects on the flight:

+ (AWS) SqsClientFactory
+ (Doctrine) EntityManagerFactory
+ MonologFactory
+ RedisClientFactory 

#### 2. Micrservices: This the the acutal sdk that provide api to each of the microservice

+ Identity service
+ Crm service
