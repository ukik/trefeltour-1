<?php

/**
  * @OA\Get(
  *      path="/v1/entities/travel-prices-public",
  *      operationId="browseTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Browse Travel Prices Public",
  *      description="Returns list of Travel Prices Public",
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Get(
  *      path="/v1/entities/travel-prices-public/read?slug=travel-prices-public&id={id}",
  *      operationId="readTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Get Travel Prices Public based on id",
  *      description="Returns Travel Prices Public based on id",
  *      @OA\Parameter(
  *          name="id",
  *          required=true,
  *          in="path",
  *          @OA\Schema(
  *              type="integer"
  *          )
  *      ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Post(
  *      path="/v1/entities/travel-prices-public/add",
  *      operationId="addTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Insert new Travel Prices Public",
  *      description="Insert new Travel Prices Public into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"uuid":"Abc", "storeId":"123", "name":"Abc", "generalPrice":"123", "discountPrice":"123", "cashbackPrice":"123", "description":"Abc", "codeTicket":"Abc", "seatCount":"Abc", "image":"Abc", "ticketStatus":"Abc", "route":"Abc", "quantity":"123", "codeTable":"Abc", "category":"Abc"},
  *                 ),
  *             )
  *         )
  *      ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Put(
  *      path="/v1/entities/travel-prices-public/edit",
  *      operationId="editTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Edit an existing Travel Prices Public",
  *      description="Edit an existing Travel Prices Public",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"uuid":"Abc", "storeId":"123", "name":"Abc", "generalPrice":"123", "discountPrice":"123", "cashbackPrice":"123", "description":"Abc", "codeTicket":"Abc", "seatCount":"Abc", "image":"Abc", "ticketStatus":"Abc", "route":"Abc", "quantity":"123", "codeTable":"Abc", "category":"Abc"},
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Delete(
  *      path="/v1/entities/travel-prices-public/delete",
  *      operationId="deleteTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Delete one record of Travel Prices Public",
  *      description="Delete one record of Travel Prices Public",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="travel-prices-public",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="string", property="field", default="id"),
  *                         @OA\Property(type="integer", property="value", example="123"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Delete(
  *      path="/v1/entities/travel-prices-public/delete-multiple",
  *      operationId="deleteMultipleTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Delete multiple record of Travel Prices Public",
  *      description="Delete multiple record of Travel Prices Public",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="travel-prices-public",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="string", property="field", default="ids"),
  *                         @OA\Property(type="{}", property="value", example="123,123"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */

/**
  * @OA\Put(
  *      path="/v1/entities/travel-prices-public/sort",
  *      operationId="sortTravelPricesPublic",
  *      tags={"travel-prices-public"},
  *      summary="Sort existing Travel Prices Public",
  *      description="Sort existing Travel Prices Public",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="travel-prices-public",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "uuid":"Abc", "storeId":"123", "name":"Abc", "generalPrice":"123", "discountPrice":"123", "cashbackPrice":"123", "description":"Abc", "codeTicket":"Abc", "seatCount":"Abc", "image":"Abc", "ticketStatus":"Abc", "route":"Abc", "quantity":"123", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "category":"Abc"}, {"id":"123", "uuid":"Abc", "storeId":"123", "name":"Abc", "generalPrice":"123", "discountPrice":"123", "cashbackPrice":"123", "description":"Abc", "codeTicket":"Abc", "seatCount":"Abc", "image":"Abc", "ticketStatus":"Abc", "route":"Abc", "quantity":"123", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "category":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="uuid"), 
  *                         @OA\Property(type="integer", property="storeId"), 
  *                         @OA\Property(type="string", property="name"), 
  *                         @OA\Property(type="integer", property="generalPrice"), 
  *                         @OA\Property(type="integer", property="discountPrice"), 
  *                         @OA\Property(type="integer", property="cashbackPrice"), 
  *                         @OA\Property(type="string", property="description"), 
  *                         @OA\Property(type="string", property="codeTicket"), 
  *                         @OA\Property(type="string", property="seatCount"), 
  *                         @OA\Property(type="string", property="image"), 
  *                         @OA\Property(type="string", property="ticketStatus"), 
  *                         @OA\Property(type="string", property="route"), 
  *                         @OA\Property(type="integer", property="quantity"), 
  *                         @OA\Property(type="string", property="codeTable"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"), 
  *                         @OA\Property(type="string", property="deletedAt"), 
  *                         @OA\Property(type="string", property="category"),
  *                     ),
  *                ),
  *             )
  *         )
  *     ),
  *      @OA\Response(response=200, description="Successful operation"),
  *      @OA\Response(response=400, description="Bad request"),
  *      @OA\Response(response=401, description="Unauthorized"),
  *      @OA\Response(response=402, description="Payment Required"),
  *      security={
  *          {"bearerAuth": {}}
  *      }
  * )
  *
  */