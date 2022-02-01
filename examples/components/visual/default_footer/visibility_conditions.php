<?php

    $cond1 = [];
    $cond1['code'] = "user.online";
    $cond1['description'] = "If user in online";
    $cond1['angular'] = "userService.isOnline()";

    $cond2 = [];
    $cond2['code'] = "user.offline";
    $cond2['description'] = "If user in offline";
    $cond2['angular'] = "!userService.isOnline()";

    $visibility_conditions = [$cond1, $cond2];

    return $visibility_conditions;
