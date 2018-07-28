<?php

namespace App\Helpers;

class GlobalSetting {
    /*
     * @funcation name  : getGlobal
     * function details : get global setting single rectord value
     * @Param           : column_name
     * @return          : string column value
     * @access e.g.      : $global_setting_value = \App\Helpers\GlobalSetting::getColumnValue('sitename');
     */

    public static function getGlobal($column_name) {
        $global_setting_data = \App\GlobalSetting::where('name', $column_name)->first();
        if (!empty($global_setting_data)) {
            $global_setting_value = $global_setting_data->value;
            return $global_setting_value;
        } else {
            return false;
        }
    }

}
