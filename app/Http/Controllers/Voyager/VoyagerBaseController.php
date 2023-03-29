<?php

namespace App\Http\Controllers\Voyager;

use App\Voyager\ContentTypes\CoordinateType;
use App\Voyager\ContentTypes\JsonOneFieldOptionContentType;
use App\Voyager\ContentTypes\JsonTwoFieldOptionContentType;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\ContentTypes\Checkbox;
use TCG\Voyager\Http\Controllers\ContentTypes\File;
use TCG\Voyager\Http\Controllers\ContentTypes\Image as ContentImage;
use TCG\Voyager\Http\Controllers\ContentTypes\MultipleCheckbox;
use TCG\Voyager\Http\Controllers\ContentTypes\MultipleImage;
use TCG\Voyager\Http\Controllers\ContentTypes\Password;
use TCG\Voyager\Http\Controllers\ContentTypes\Relationship;
use TCG\Voyager\Http\Controllers\ContentTypes\SelectMultiple;
use TCG\Voyager\Http\Controllers\ContentTypes\Text;
use TCG\Voyager\Http\Controllers\ContentTypes\Timestamp;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class VoyagerBaseController extends BaseVoyagerBaseController
{

}
