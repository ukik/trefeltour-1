<?php

/**
  * @OA\Get(
  *      path="/v1/entities/tour-booking-payments",
  *      operationId="browseTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Browse Tour Booking Payments",
  *      description="Returns list of Tour Booking Payments",
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
  *      path="/v1/entities/tour-booking-payments/read?slug=tour-booking-payments&id={id}",
  *      operationId="readTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Get Tour Booking Payments based on id",
  *      description="Returns Tour Booking Payments based on id",
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
  *      path="/v1/entities/tour-booking-payments/add",
  *      operationId="addTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Insert new Tour Booking Payments",
  *      description="Insert new Tour Booking Payments into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"uuid":"Abc", "bookingId":"123", "bookingUuid":"Abc", "bookingItemId":"123", "orderId":"Abc", "storeId":"123", "productId":"123", "customerId":"123", "quantitySum":"123", "coupon":"123", "grossAmount":"123", "dibayar":"Abc", "status":"Abc", "firstName":"Abc", "email":"Abc", "phone":"Abc", "snapToken":"Abc", "codeTable":"Abc"},
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
  *      path="/v1/entities/tour-booking-payments/edit",
  *      operationId="editTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Edit an existing Tour Booking Payments",
  *      description="Edit an existing Tour Booking Payments",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"uuid":"Abc", "bookingId":"123", "bookingUuid":"Abc", "bookingItemId":"123", "orderId":"Abc", "storeId":"123", "productId":"123", "customerId":"123", "quantitySum":"123", "coupon":"123", "grossAmount":"123", "dibayar":"Abc", "status":"Abc", "firstName":"Abc", "email":"Abc", "phone":"Abc", "snapToken":"Abc", "codeTable":"Abc"},
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
  *      path="/v1/entities/tour-booking-payments/delete",
  *      operationId="deleteTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Delete one record of Tour Booking Payments",
  *      description="Delete one record of Tour Booking Payments",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="tour-booking-payments",
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
  *      path="/v1/entities/tour-booking-payments/delete-multiple",
  *      operationId="deleteMultipleTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Delete multiple record of Tour Booking Payments",
  *      description="Delete multiple record of Tour Booking Payments",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="tour-booking-payments",
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
  *      path="/v1/entities/tour-booking-payments/sort",
  *      operationId="sortTourBookingPayments",
  *      tags={"tour-booking-payments"},
  *      summary="Sort existing Tour Booking Payments",
  *      description="Sort existing Tour Booking Payments",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="tour-booking-payments",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "uuid":"Abc", "bookingId":"123", "bookingUuid":"Abc", "bookingItemId":"123", "orderId":"Abc", "storeId":"123", "productId":"123", "customerId":"123", "quantitySum":"123", "coupon":"123", "grossAmount":"123", "dibayar":"Abc", "status":"Abc", "firstName":"Abc", "email":"Abc", "phone":"Abc", "snapToken":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z"}, {"id":"123", "uuid":"Abc", "bookingId":"123", "bookingUuid":"Abc", "bookingItemId":"123", "orderId":"Abc", "storeId":"123", "productId":"123", "customerId":"123", "quantitySum":"123", "coupon":"123", "grossAmount":"123", "dibayar":"Abc", "status":"Abc", "firstName":"Abc", "email":"Abc", "phone":"Abc", "snapToken":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="uuid"), 
  *                         @OA\Property(type="integer", property="bookingId"), 
  *                         @OA\Property(type="string", property="bookingUuid"), 
  *                         @OA\Property(type="integer", property="bookingItemId"), 
  *                         @OA\Property(type="string", property="orderId"), 
  *                         @OA\Property(type="integer", property="storeId"), 
  *                         @OA\Property(type="integer", property="productId"), 
  *                         @OA\Property(type="integer", property="customerId"), 
  *                         @OA\Property(type="integer", property="quantitySum"), 
  *                         @OA\Property(type="integer", property="coupon"), 
  *                         @OA\Property(type="integer", property="grossAmount"), 
  *                         @OA\Property(type="string", property="dibayar"), 
  *                         @OA\Property(type="string", property="status"), 
  *                         @OA\Property(type="string", property="firstName"), 
  *                         @OA\Property(type="string", property="email"), 
  *                         @OA\Property(type="string", property="phone"), 
  *                         @OA\Property(type="string", property="snapToken"), 
  *                         @OA\Property(type="string", property="codeTable"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"), 
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