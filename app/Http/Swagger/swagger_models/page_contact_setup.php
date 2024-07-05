<?php

/**
  * @OA\Get(
  *      path="/v1/entities/page-contact-setup",
  *      operationId="browsePageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Browse Page Contact Setup",
  *      description="Returns list of Page Contact Setup",
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
  *      path="/v1/entities/page-contact-setup/read?slug=page-contact-setup&id={id}",
  *      operationId="readPageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Get Page Contact Setup based on id",
  *      description="Returns Page Contact Setup based on id",
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
  *      path="/v1/entities/page-contact-setup/add",
  *      operationId="addPageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Insert new Page Contact Setup",
  *      description="Insert new Page Contact Setup into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"title1":"Abc", "headline1":"Abc", "description1":"Abc", "title2":"Abc", "headline2":"Abc", "description2":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Value":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Value":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Value":"Abc", "map":"Abc", "twitter":"Abc", "facebook":"Abc", "youtube":"Abc", "tiktok":"Abc", "instagram":"Abc", "discord":"Abc", "whatsapp":"Abc", "telegram":"Abc", "lang":"Abc"},
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
  *      path="/v1/entities/page-contact-setup/edit",
  *      operationId="editPageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Edit an existing Page Contact Setup",
  *      description="Edit an existing Page Contact Setup",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"title1":"Abc", "headline1":"Abc", "description1":"Abc", "title2":"Abc", "headline2":"Abc", "description2":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Value":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Value":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Value":"Abc", "map":"Abc", "twitter":"Abc", "facebook":"Abc", "youtube":"Abc", "tiktok":"Abc", "instagram":"Abc", "discord":"Abc", "whatsapp":"Abc", "telegram":"Abc", "lang":"Abc"},
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
  *      path="/v1/entities/page-contact-setup/delete",
  *      operationId="deletePageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Delete one record of Page Contact Setup",
  *      description="Delete one record of Page Contact Setup",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="page-contact-setup",
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
  *      path="/v1/entities/page-contact-setup/delete-multiple",
  *      operationId="deleteMultiplePageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Delete multiple record of Page Contact Setup",
  *      description="Delete multiple record of Page Contact Setup",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="page-contact-setup",
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
  *      path="/v1/entities/page-contact-setup/sort",
  *      operationId="sortPageContactSetup",
  *      tags={"page-contact-setup"},
  *      summary="Sort existing Page Contact Setup",
  *      description="Sort existing Page Contact Setup",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="page-contact-setup",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "title1":"Abc", "headline1":"Abc", "description1":"Abc", "title2":"Abc", "headline2":"Abc", "description2":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Value":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Value":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Value":"Abc", "map":"Abc", "twitter":"Abc", "facebook":"Abc", "youtube":"Abc", "tiktok":"Abc", "instagram":"Abc", "discord":"Abc", "whatsapp":"Abc", "telegram":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "lang":"Abc"}, {"id":"123", "title1":"Abc", "headline1":"Abc", "description1":"Abc", "title2":"Abc", "headline2":"Abc", "description2":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Value":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Value":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Value":"Abc", "map":"Abc", "twitter":"Abc", "facebook":"Abc", "youtube":"Abc", "tiktok":"Abc", "instagram":"Abc", "discord":"Abc", "whatsapp":"Abc", "telegram":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "lang":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="title1"), 
  *                         @OA\Property(type="string", property="headline1"), 
  *                         @OA\Property(type="string", property="description1"), 
  *                         @OA\Property(type="string", property="title2"), 
  *                         @OA\Property(type="string", property="headline2"), 
  *                         @OA\Property(type="string", property="description2"), 
  *                         @OA\Property(type="string", property="grid1Icon"), 
  *                         @OA\Property(type="string", property="grid1Title"), 
  *                         @OA\Property(type="string", property="grid1Value"), 
  *                         @OA\Property(type="string", property="grid2Icon"), 
  *                         @OA\Property(type="string", property="grid2Title"), 
  *                         @OA\Property(type="string", property="grid2Value"), 
  *                         @OA\Property(type="string", property="grid3Icon"), 
  *                         @OA\Property(type="string", property="grid3Title"), 
  *                         @OA\Property(type="string", property="grid3Value"), 
  *                         @OA\Property(type="string", property="map"), 
  *                         @OA\Property(type="string", property="twitter"), 
  *                         @OA\Property(type="string", property="facebook"), 
  *                         @OA\Property(type="string", property="youtube"), 
  *                         @OA\Property(type="string", property="tiktok"), 
  *                         @OA\Property(type="string", property="instagram"), 
  *                         @OA\Property(type="string", property="discord"), 
  *                         @OA\Property(type="string", property="whatsapp"), 
  *                         @OA\Property(type="string", property="telegram"), 
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