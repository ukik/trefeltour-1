<?php

/**
  * @OA\Get(
  *      path="/v1/entities/page-widget-offer",
  *      operationId="browsePageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Browse Page Widget Offer",
  *      description="Returns list of Page Widget Offer",
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
  *      path="/v1/entities/page-widget-offer/read?slug=page-widget-offer&id={id}",
  *      operationId="readPageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Get Page Widget Offer based on id",
  *      description="Returns Page Widget Offer based on id",
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
  *      path="/v1/entities/page-widget-offer/add",
  *      operationId="addPageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Insert new Page Widget Offer",
  *      description="Insert new Page Widget Offer into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"title":"Abc", "headline":"Abc", "subtitle":"Abc", "image":"Abc", "image1":"Abc", "image2":"Abc", "image3":"Abc", "image4":"Abc", "image5":"Abc", "image6":"Abc", "lang":"Abc"},
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
  *      path="/v1/entities/page-widget-offer/edit",
  *      operationId="editPageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Edit an existing Page Widget Offer",
  *      description="Edit an existing Page Widget Offer",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"title":"Abc", "headline":"Abc", "subtitle":"Abc", "image":"Abc", "image1":"Abc", "image2":"Abc", "image3":"Abc", "image4":"Abc", "image5":"Abc", "image6":"Abc", "lang":"Abc"},
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
  *      path="/v1/entities/page-widget-offer/delete",
  *      operationId="deletePageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Delete one record of Page Widget Offer",
  *      description="Delete one record of Page Widget Offer",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="page-widget-offer",
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
  *      path="/v1/entities/page-widget-offer/delete-multiple",
  *      operationId="deleteMultiplePageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Delete multiple record of Page Widget Offer",
  *      description="Delete multiple record of Page Widget Offer",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="page-widget-offer",
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
  *      path="/v1/entities/page-widget-offer/sort",
  *      operationId="sortPageWidgetOffer",
  *      tags={"page-widget-offer"},
  *      summary="Sort existing Page Widget Offer",
  *      description="Sort existing Page Widget Offer",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="page-widget-offer",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "title":"Abc", "headline":"Abc", "subtitle":"Abc", "image":"Abc", "image1":"Abc", "image2":"Abc", "image3":"Abc", "image4":"Abc", "image5":"Abc", "image6":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "lang":"Abc"}, {"id":"123", "title":"Abc", "headline":"Abc", "subtitle":"Abc", "image":"Abc", "image1":"Abc", "image2":"Abc", "image3":"Abc", "image4":"Abc", "image5":"Abc", "image6":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "lang":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="title"), 
  *                         @OA\Property(type="string", property="headline"), 
  *                         @OA\Property(type="string", property="subtitle"), 
  *                         @OA\Property(type="string", property="image"), 
  *                         @OA\Property(type="string", property="image1"), 
  *                         @OA\Property(type="string", property="image2"), 
  *                         @OA\Property(type="string", property="image3"), 
  *                         @OA\Property(type="string", property="image4"), 
  *                         @OA\Property(type="string", property="image5"), 
  *                         @OA\Property(type="string", property="image6"), 
  *                         @OA\Property(type="string", property="createdAt"), 
  *                         @OA\Property(type="string", property="updatedAt"), 
  *                         @OA\Property(type="string", property="deletedAt"), 
  *                         @OA\Property(type="string", property="lang"),
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