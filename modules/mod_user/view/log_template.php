<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

$log_data = json_decode($data['description'], true);
if (isset($log_data['old_data']) && !empty($log_data['old_data'])) { ?>
    <table class='custom-table table'>
        <thead><tr><th>Old Data</th></tr></thead>
        <tbody>
            <tr>
                <td>
                    <?php write_log($log_data['old_data'], "Old Data", $log_data);?>
                </td>
            </tr>
        </tbody>
    </table>
<?php }
if (isset($log_data['new_data']) && !empty($log_data['new_data'])) { ?>
    <table class='custom-table table'>
        <thead><tr><th>New Data</th></tr></thead>
        <tbody>
            <tr>
                <td>
                    <?php write_log($log_data['new_data'], "New Data", $log_data);?>
                </td>
            </tr>
        </tbody>
    </table>
<?php }

function write_log($data, $title = "", $log_data) {
    foreach ($data as $key => $val) {
        signle_table($val, $title, $key, $log_data);
    }
}

function signle_table($table, $title = "", $arr_key, $log_data) {?>
    <table class='tbl_description'>
        <thead>
            <?php
            foreach ($table as $key => $val) {?>
                <tr>
                    <th><?php echo $val['label']; ?></th>
                    <td <?php echo $attributes; ?>><?php echo $val['value']; ?></td>
                </tr>
            <?php } ?>
        </thead>
    </table>
    <?php
}
?>