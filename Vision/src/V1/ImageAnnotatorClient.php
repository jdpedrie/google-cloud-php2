<?php
/*
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/vision/v1/image_annotator.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * EXPERIMENTAL: This client library class has not yet been declared GA (1.0). This means that
 * even though we intend the surface to be stable, we may make backwards incompatible changes
 * if necessary.
 *
 * @experimental
 */

namespace Google\Cloud\Vision\V1;

use Google\ApiCore\ApiException;
use Google\ApiCore\ArrayTrait;
use Google\ApiCore\RetrySettings;
use Google\Cloud\Vision\VisionHelpersTrait;
use Google\Cloud\Vision\V1\Gapic\ImageAnnotatorGapicClient;
use InvalidArgumentException;

/**
 * {@inheritdoc}
 */
class ImageAnnotatorClient extends ImageAnnotatorGapicClient
{
    use VisionHelpersTrait;

    /**
     * Creates an Image object that can be used as part of an image annotation request.
     *
     * Example:
     * ```
     * //[snippet=resource]
     * $imageResource = fopen('path/to/image.jpg', 'r');
     * $image = $imageAnnotatorClient->createImageObject($imageResource);
     * $response = $imageAnnotatorClient->faceDetection($image);
     * ```
     *
     * ```
     * //[snippet=data]
     * $imageData = file_get_contents('path/to/image.jpg');
     * $image = $imageAnnotatorClient->createImageObject($imageData);
     * $response = $imageAnnotatorClient->faceDetection($image);
     * ```
     *
     * ```
     * //[snippet=url]
     * $imageUri = "gs://my-bucket/image.jpg";
     * $image = $imageAnnotatorClient->createImageObject($imageUri);
     * $response = $imageAnnotatorClient->faceDetection($image);
     * ```
     *
     * @param  resource|string $imageInput An image to configure with
     *         the given settings. This parameter will accept a resource, a
     *         string of bytes, or the URI of an image in a publicly-accessible
     *         web location.
     * @return Image
     * @throws InvalidArgumentException
     */
    public function createImageObject($imageInput)
    {
        return $this->createImageHelper(Image::class, ImageSource::class, $imageInput);
    }

    /**
     * Run image detection and annotation for an image.
     *
     * Example:
     * ```
     * use Google\Cloud\Vision\V1\Feature;
     * use Google\Cloud\Vision\V1\Feature_Type;
     *
     * $imageResource = fopen('path/to/image.jpg', 'r');
     * $features = [Feature_Type::FACE_DETECTION];
     * $response = $imageAnnotatorClient->annotateImage($imageResource, $features);
     * ```
     *
     * @param resource|string|Image $image        The image to be processed.
     * @param Feature[]|int[]       $features     Requested features.
     * @param array                 $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function annotateImage($image, $features, $optionalArgs = [])
    {
        $image = $this->createImageObject($image);
        return $this->annotateImageHelper(
            [$this, 'batchAnnotateImages'],
            AnnotateImageRequest::class,
            $image,
            $features,
            $optionalArgs
        );
    }

    /**
     * Run face detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->faceDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function faceDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::FACE_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run landmark detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->landmarkDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function landmarkDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::LANDMARK_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run logo detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->logoDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function logoDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::LOGO_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run label detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->labelDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function labelDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::LABEL_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run text detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->textDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function textDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::TEXT_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run document text detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->documentTextDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function documentTextDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::DOCUMENT_TEXT_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run safe search detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->safeSearchDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function safeSearchDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::SAFE_SEARCH_DETECTION,
            $optionalArgs
        );
    }

    /**
     * Run image properties detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->imagePropertiesDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function imagePropertiesDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::IMAGE_PROPERTIES,
            $optionalArgs
        );
    }

    /**
     * Run crop hints detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->cropHintsDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function cropHintsDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::CROP_HINTS,
            $optionalArgs
        );
    }

    /**
     * Run web detection for an image.
     *
     * Example:
     * ```
     * $imageContent = file_get_contents('path/to/image.jpg');
     * $response = $imageAnnotatorClient->webDetection($imageContent);
     * ```
     *
     * @param Image $image        An image annotation request.
     * @param array $optionalArgs {
     *     Configuration Options.
     *
     *     @type ImageContext        $imageContext  Additional context that may accompany the image.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return AnnotateImageResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function webDetection($image, $optionalArgs = [])
    {
        return $this->annotateSingleFeature(
            $image,
            Feature_Type::WEB_DETECTION,
            $optionalArgs
        );
    }

    /**
     * @param Image $image
     * @param Feature|int $featureType
     * @param array $optionalArgs
     * @return AnnotateImageResponse
     */
    private function annotateSingleFeature($image, $featureType, $optionalArgs)
    {
        return $this->annotateImage($image, [$featureType], $optionalArgs);
    }
}
