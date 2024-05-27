<?php

/**
  * @OA\Get(
  *      path="/v1/entities/travel-tickets",
  *      operationId="browseTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Browse Travel Tiket",
  *      description="Returns list of Travel Tiket",
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
  *      path="/v1/entities/travel-tickets/read?slug=travel-tickets&id={id}",
  *      operationId="readTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Get Travel Tiket based on id",
  *      description="Returns Travel Tiket based on id",
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
  *      path="/v1/entities/travel-tickets/add",
  *      operationId="addTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Insert new Travel Tiket",
  *      description="Insert new Travel Tiket into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"seatNo":"Abc", "ticketStatus":"Abc", "nameUnit":"Abc", "travelDate":"2021-01-01T00:00:00.000Z", "description":"Abc", "ticketPrice":"123", "ticketDiscountPrice":"123", "ticketCashbackPrice":"123", "departureTerminal":"Abc", "arrivelTerminal":"Abc", "codeTicket":"Abc", "policy":"Abc", "images":"Abc"},
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
  *      path="/v1/entities/travel-tickets/edit",
  *      operationId="editTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Edit an existing Travel Tiket",
  *      description="Edit an existing Travel Tiket",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"seatNo":"Abc", "ticketStatus":"Abc", "nameUnit":"Abc", "travelDate":"2021-01-01T00:00:00.000Z", "description":"Abc", "ticketPrice":"123", "ticketDiscountPrice":"123", "ticketCashbackPrice":"123", "departureTerminal":"Abc", "arrivelTerminal":"Abc", "codeTicket":"Abc", "policy":"Abc", "images":"Abc"},
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
  *      path="/v1/entities/travel-tickets/delete",
  *      operationId="deleteTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Delete one record of Travel Tiket",
  *      description="Delete one record of Travel Tiket",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="travel-tickets",
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
  *      path="/v1/entities/travel-tickets/delete-multiple",
  *      operationId="deleteMultipleTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Delete multiple record of Travel Tiket",
  *      description="Delete multiple record of Travel Tiket",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="travel-tickets",
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
  *      path="/v1/entities/travel-tickets/sort",
  *      operationId="sortTravelTiket",
  *      tags={"travel-tickets"},
  *      summary="Sort existing Travel Tiket",
  *      description="Sort existing Travel Tiket",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="travel-tickets",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "reservationId":"", "customerId":"", "seatNo":"Abc", "ticketStatus":"Abc", "nameUnit":"Abc", "travelDate":"2021-01-01T00:00:00.000Z", "description":"Abc", "ticketPrice":"123", "ticketDiscountPrice":"123", "ticketCashbackPrice":"123", "departureTerminal":"Abc", "arrivelTerminal":"Abc", "codeTicket":"Abc", "policy":"Abc", "images":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "uuid":"Abc", "deletedAt":"2021-01-01T00:00:00.000Z"}, {"id":"123", "reservationId":"", "customerId":"", "seatNo":"Abc", "ticketStatus":"Abc", "nameUnit":"Abc", "travelDate":"2021-01-01T00:00:00.000Z", "description":"Abc", "ticketPrice":"123", "ticketDiscountPrice":"123", "ticketCashbackPrice":"123", "departureTerminal":"Abc", "arrivelTerminal":"Abc", "codeTicket":"Abc", "policy":"Abc", "images":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "uuid":"Abc", "deletedAt":"2021-01-01T00:00:00.000Z"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="reservationId"), 
  *                         @OA\Property(type="string", property="customerId"), 
  *                         @OA\Property(type="string", property="seatNo"), 
  *                         @OA\Property(type="string", property="ticketStatus"), 
  *                         @OA\Property(type="string", property="nameUnit"), 
  *                         @OA\Property(type="string", property="travelDate"), 
  *                         @OA\Property(type="string", property="description"), 
  *                         @OA\Property(type="integer", property="ticketPrice"), 
  *                         @OA\Property(type="integer", property="ticketDiscountPrice"), 
  *                         @OA\Property(type="integer", property="ticketCashbackPrice"), 
  *                         @OA\Property(type="string", property="departureTerminal"), 
  *                         @OA\Property(type="string", property="arrivelTerminal"), 
  *                         @OA\Property(type="string", property="codeTicket"), 
  *                         @OA\Property(type="string", property="policy"), 
  *                         @OA\Property(type="string", property="images"), 
  *                         @OA\Property(type="string", property="codeTable"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"), 
  *                         @OA\Property(type="string", property="uuid"), 
  *                         @OA\Property(type="string", property="deletedAt"),
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