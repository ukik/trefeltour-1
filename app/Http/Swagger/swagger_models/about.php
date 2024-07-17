<?php

/**
  * @OA\Get(
  *      path="/v1/entities/about",
  *      operationId="browseAbout",
  *      tags={"about"},
  *      summary="Browse About",
  *      description="Returns list of About",
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
  *      path="/v1/entities/about/read?slug=about&id={id}",
  *      operationId="readAbout",
  *      tags={"about"},
  *      summary="Get About based on id",
  *      description="Returns About based on id",
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
  *      path="/v1/entities/about/add",
  *      operationId="addAbout",
  *      tags={"about"},
  *      summary="Insert new About",
  *      description="Insert new About into database",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"title":"Abc", "tagline":"Abc", "logo":"Abc", "featuredImage":"Abc", "description":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Description":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Description":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Description":"Abc", "grid4Icon":"Abc", "grid4Title":"Abc", "grid4Description":"Abc", "gridImage1":"Abc", "gridImage2":"Abc", "gridImage3":"Abc", "bottomLabel1":"Abc", "bottomLabel2":"Abc", "lang":"Abc"},
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
  *      path="/v1/entities/about/edit",
  *      operationId="editAbout",
  *      tags={"about"},
  *      summary="Edit an existing About",
  *      description="Edit an existing About",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="data",
  *                     type="object",
  *                     example={"title":"Abc", "tagline":"Abc", "logo":"Abc", "featuredImage":"Abc", "description":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Description":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Description":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Description":"Abc", "grid4Icon":"Abc", "grid4Title":"Abc", "grid4Description":"Abc", "gridImage1":"Abc", "gridImage2":"Abc", "gridImage3":"Abc", "bottomLabel1":"Abc", "bottomLabel2":"Abc", "lang":"Abc"},
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
  *      path="/v1/entities/about/delete",
  *      operationId="deleteAbout",
  *      tags={"about"},
  *      summary="Delete one record of About",
  *      description="Delete one record of About",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="about",
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
  *      path="/v1/entities/about/delete-multiple",
  *      operationId="deleteMultipleAbout",
  *      tags={"about"},
  *      summary="Delete multiple record of About",
  *      description="Delete multiple record of About",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="about",
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
  *      path="/v1/entities/about/sort",
  *      operationId="sortAbout",
  *      tags={"about"},
  *      summary="Sort existing About",
  *      description="Sort existing About",
  *      @OA\RequestBody(
  *         @OA\MediaType(
  *             mediaType="application/json",
  *             @OA\Schema(
  *                 @OA\Property(
  *                     property="slug",
  *                     example="about",
  *                     type="string"
  *                 ),
  *                 @OA\Property(
  *                     property="data",
  *                     type="array",
  *                     example={{"id":"123", "title":"Abc", "tagline":"Abc", "logo":"Abc", "featuredImage":"Abc", "description":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Description":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Description":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Description":"Abc", "grid4Icon":"Abc", "grid4Title":"Abc", "grid4Description":"Abc", "gridImage1":"Abc", "gridImage2":"Abc", "gridImage3":"Abc", "bottomLabel1":"Abc", "bottomLabel2":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "lang":"Abc"}, {"id":"123", "title":"Abc", "tagline":"Abc", "logo":"Abc", "featuredImage":"Abc", "description":"Abc", "grid1Icon":"Abc", "grid1Title":"Abc", "grid1Description":"Abc", "grid2Icon":"Abc", "grid2Title":"Abc", "grid2Description":"Abc", "grid3Icon":"Abc", "grid3Title":"Abc", "grid3Description":"Abc", "grid4Icon":"Abc", "grid4Title":"Abc", "grid4Description":"Abc", "gridImage1":"Abc", "gridImage2":"Abc", "gridImage3":"Abc", "bottomLabel1":"Abc", "bottomLabel2":"Abc", "createdAt":"2021-01-01T00:00:00.000Z", "updatedAt":"2021-01-01T00:00:00.000Z", "deletedAt":"2021-01-01T00:00:00.000Z", "lang":"Abc"}},
  *                     @OA\Items(
  *                         type="object",
  *                         @OA\Property(type="integer", property="id"), 
  *                         @OA\Property(type="string", property="title"), 
  *                         @OA\Property(type="string", property="tagline"), 
  *                         @OA\Property(type="string", property="logo"), 
  *                         @OA\Property(type="string", property="featuredImage"), 
  *                         @OA\Property(type="string", property="description"), 
  *                         @OA\Property(type="string", property="grid1Icon"), 
  *                         @OA\Property(type="string", property="grid1Title"), 
  *                         @OA\Property(type="string", property="grid1Description"), 
  *                         @OA\Property(type="string", property="grid2Icon"), 
  *                         @OA\Property(type="string", property="grid2Title"), 
  *                         @OA\Property(type="string", property="grid2Description"), 
  *                         @OA\Property(type="string", property="grid3Icon"), 
  *                         @OA\Property(type="string", property="grid3Title"), 
  *                         @OA\Property(type="string", property="grid3Description"), 
  *                         @OA\Property(type="string", property="grid4Icon"), 
  *                         @OA\Property(type="string", property="grid4Title"), 
  *                         @OA\Property(type="string", property="grid4Description"), 
  *                         @OA\Property(type="string", property="gridImage1"), 
  *                         @OA\Property(type="string", property="gridImage2"), 
  *                         @OA\Property(type="string", property="gridImage3"), 
  *                         @OA\Property(type="string", property="bottomLabel1"), 
  *                         @OA\Property(type="string", property="bottomLabel2"), 
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