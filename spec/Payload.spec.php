<?php

use Ellipse\ADR\Payload;
use Ellipse\ADR\PayloadInterface;

describe('Payload', function () {

    it('should implement JsonSerializable', function () {

        $test = new Payload('status');

        expect($test)->toBeAnInstanceOf(JsonSerializable::class);

    });

    it('should implement PayloadInterface', function () {

        $test = new Payload('status');

        expect($test)->toBeAnInstanceOf(PayloadInterface::class);

    });

    describe('->status()', function () {

        it('should return the status', function () {

            $payload = new Payload('status');

            $test = $payload->status();

            expect($test)->toEqual('status');

        });

    });

    describe('->data()', function () {

        context('when the payload does not have data', function () {

            it('should return an empty array', function () {

                $payload = new Payload('status');

                $test = $payload->data();

                expect($test)->toEqual([]);

            });

        });

        context('when the payload does not have data', function () {

            it('should return the data', function () {

                $payload = new Payload('status', ['key' => 'value']);

                $test = $payload->data();

                expect($test)->toEqual(['key' => 'value']);

            });

        });

    });

    context('when json encoded', function () {

        context('when the payload does not have data', function () {

            it('should return a json string with the status and an empty array', function () {

                $payload = new Payload('status');

                $test = json_encode($payload);

                expect($test)->toEqual(json_encode([
                    'status' => 'status',
                    'data' => [],
                ]));

            });

        });

        context('when the payload does not have data', function () {

            it('should return the data', function () {

                $payload = new Payload('status', ['key' => 'value']);

                $test = json_encode($payload);

                expect($test)->toEqual(json_encode([
                    'status' => 'status',
                    'data' => ['key' => 'value'],
                ]));

            });

        });

    });

});
