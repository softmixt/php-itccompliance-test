<?php
/**
 * Created by SoftMixt.
 * User: adrian
 * Date: 12/8/22
 * Time: 14:46
 */

namespace App\Config\Web;

require SITE_ROOT.'/App/Config/constants.php';
require SITE_ROOT.'/App/Config/services.php';
require SITE_ROOT.'/App/Router/web.php';

use Framework\Framework;

Framework::run();
