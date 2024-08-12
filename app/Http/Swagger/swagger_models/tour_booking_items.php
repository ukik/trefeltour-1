<?php

/**
  * @OA\Get(
  *      path="/v1/entities/tour-booking-items",
  *      operationId="browseTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Browse Tour Booking Item",
  *      description="Returns list of Tour Booking Item",
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
  *      path="/v1/entities/tour-booking-items/read?slug=tour-booking-items&id={id}",
  *      operationId="readTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Get Tour Booking Item based on id",
  *      description="Returns Tour Booking Item based on id",
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
  *      path="/v1/entities/tour-booking-items/add",
  *      operationId="addTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Insert new Tour Booking Item",
  *      description="Insert new Tour Booking Item into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={},
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
  *      path="/v1/entities/tour-booking-items/edit",
  *      operationId="editTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Edit an existing Tour Booking Item",
  *      description="Edit an existing Tour Booking Item",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={},
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
  *      path="/v1/entities/tour-booking-items/delete",
  *      operationId="deleteTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Delete one record of Tour Booking Item",
  *      description="Delete one record of Tour Booking Item",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="tour-booking-items",
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
  *      path="/v1/entities/tour-booking-items/delete-multiple",
  *      operationId="deleteMultipleTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Delete multiple record of Tour Booking Item",
  *      description="Delete multiple record of Tour Booking Item",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="tour-booking-items",
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
  *      path="/v1/entities/tour-booking-items/sort",
  *      operationId="sortTourBookingItem",
  *      tags={"tour-booking-items"},
  *      summary="Sort existing Tour Booking Item",
  *      description="Sort existing Tour Booking Item",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="tour-booking-items",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "uuid":"Abc", "customerId":"", "storeId":"", "bookingId":"", "productId":"", "name":"Abc", "getPrice":"123", "getDiscount":"123", "getCashback":"123", "getTotalAmount":"123", "quantity":"123", "getFinalAmount":"123", "description":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "priceId":"123", "getPriceChild":"Abc", "getTotalAmountChild":"Abc", "stock":"Abc", "minParticipant":"123", "dateStart":"Abc", "participantAdult":"123", "participantYoung":"123", "hotel":"Abc"}, {"id":"123", "uuid":"Abc", "customerId":"", "storeId":"", "bookingId":"", "productId":"", "name":"Abc", "getPrice":"123", "getDiscount":"123", "getCashback":"123", "getTotalAmount":"123", "quantity":"123", "getFinalAmount":"123", "description":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "priceId":"123", "getPriceChild":"Abc", "getTotalAmountChild":"Abc", "stock":"Abc", "minParticipant":"123", "dateStart":"Abc", "participantAdult":"123", "participantYoung":"123", "hotel":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="uuid"), 
  *                         @OA\Property(type="string", property="customerId"), 
  *                         @OA\Property(type="string", property="storeId"), 
  *                         @OA\Property(type="string", property="bookingId"), 
  *                         @OA\Property(type="string", property="productId"), 
  *                         @OA\Property(type="string", property="name"), 
  *                         @OA\Property(type="integer", property="getPrice"), 
  *                         @OA\Property(type="integer", property="getDiscount"), 
  *                         @OA\Property(type="integer", property="getCashback"), 
  *                         @OA\Property(type="integer", property="getTotalAmount"), 
  *                         @OA\Property(type="integer", property="quantity"), 
  *                         @OA\Property(type="integer", property="getFinalAmount"), 
  *                         @OA\Property(type="string", property="description"), 
  *                         @OA\Property(type="string", property="codeTable"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"), 
  *                         @OA\Property(type="string", property="deletedAt"), 
  *                         @OA\Property(type="integer", property="priceId"), 
  *                         @OA\Property(type="string", property="getPriceChild"), 
  *                         @OA\Property(type="string", property="getTotalAmountChild"), 
  *                         @OA\Property(type="string", property="stock"), 
  *                         @OA\Property(type="integer", property="minParticipant"), 
  *                         @OA\Property(type="string", property="dateStart"), 
  *                         @OA\Property(type="integer", property="participantAdult"), 
  *                         @OA\Property(type="integer", property="participantYoung"), 
  *                         @OA\Property(type="string", property="hotel"),
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