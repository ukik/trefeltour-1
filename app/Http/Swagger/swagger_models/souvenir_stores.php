<?php

/**
  * @OA\Get(
  *      path="/v1/entities/souvenir-stores",
  *      operationId="browseSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Browse Suvenir Toko",
  *      description="Returns list of Suvenir Toko",
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
  *      path="/v1/entities/souvenir-stores/read?slug=souvenir-stores&id={id}",
  *      operationId="readSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Get Suvenir Toko based on id",
  *      description="Returns Suvenir Toko based on id",
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
  *      path="/v1/entities/souvenir-stores/add",
  *      operationId="addSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Insert new Suvenir Toko",
  *      description="Insert new Suvenir Toko into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"name":"Abc", "email":"Abc", "phone":"Abc", "location":"Abc", "image":"Abc", "address":"Abc", "codepos":"123", "city":"Abc", "country":"Abc", "policy":"Abc", "description":"Abc", "isAvailable":"Abc"},
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
  *      path="/v1/entities/souvenir-stores/edit",
  *      operationId="editSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Edit an existing Suvenir Toko",
  *      description="Edit an existing Suvenir Toko",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"name":"Abc", "email":"Abc", "phone":"Abc", "location":"Abc", "image":"Abc", "address":"Abc", "codepos":"123", "city":"Abc", "country":"Abc", "policy":"Abc", "description":"Abc", "isAvailable":"Abc"},
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
  *      path="/v1/entities/souvenir-stores/delete",
  *      operationId="deleteSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Delete one record of Suvenir Toko",
  *      description="Delete one record of Suvenir Toko",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="souvenir-stores",
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
  *      path="/v1/entities/souvenir-stores/delete-multiple",
  *      operationId="deleteMultipleSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Delete multiple record of Suvenir Toko",
  *      description="Delete multiple record of Suvenir Toko",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="souvenir-stores",
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
  *      path="/v1/entities/souvenir-stores/sort",
  *      operationId="sortSuvenirToko",
  *      tags={"souvenir-stores"},
  *      summary="Sort existing Suvenir Toko",
  *      description="Sort existing Suvenir Toko",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="souvenir-stores",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "uuid":"Abc", "userId":"", "name":"Abc", "email":"Abc", "phone":"Abc", "location":"Abc", "image":"Abc", "address":"Abc", "codepos":"123", "city":"Abc", "country":"Abc", "policy":"Abc", "description":"Abc", "isAvailable":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z"}, {"id":"123", "uuid":"Abc", "userId":"", "name":"Abc", "email":"Abc", "phone":"Abc", "location":"Abc", "image":"Abc", "address":"Abc", "codepos":"123", "city":"Abc", "country":"Abc", "policy":"Abc", "description":"Abc", "isAvailable":"Abc", "codeTable":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="uuid"), 
  *                         @OA\Property(type="string", property="userId"), 
  *                         @OA\Property(type="string", property="name"), 
  *                         @OA\Property(type="string", property="email"), 
  *                         @OA\Property(type="string", property="phone"), 
  *                         @OA\Property(type="string", property="location"), 
  *                         @OA\Property(type="string", property="image"), 
  *                         @OA\Property(type="string", property="address"), 
  *                         @OA\Property(type="integer", property="codepos"), 
  *                         @OA\Property(type="string", property="city"), 
  *                         @OA\Property(type="string", property="country"), 
  *                         @OA\Property(type="string", property="policy"), 
  *                         @OA\Property(type="string", property="description"), 
  *                         @OA\Property(type="string", property="isAvailable"), 
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