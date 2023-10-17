<?php

namespace Lib;

class HttpRequest {
    
    /**
     * Get $_GET content, array or array item in filtered way
     *
     * @param object $parameter could be array or array item
     */
    public function get($parameter = null)
    {
        if ($parameter == null) {
            if (is_array($_GET)) {
                $request = array();

                foreach ($_GET as $key => $param) {
                    $request[$key] = strip_tags(trim(addslashes(htmlspecialchars($param))));
                }

                return $request;
            }
        } else if (isset($_GET[$parameter])) {
            return strip_tags(trim(addslashes(htmlspecialchars($_GET[$parameter]))));
        }

        return false;
    }

    /**
     * Get $_POST content, array or array item in filtered way
     *
     * @param object $parameter could be array or array item
     */
    public function post($parameter = null)
    {
        if ($parameter == null && $_POST) {
            if (is_array($_POST)) {
                $request = array();

                foreach ($_POST as $key => $param) {
                    $request[$key] = htmlspecialchars(addslashes(trim($param)));
                }

                return $request;
            }
        } else if (!empty($_POST[$parameter])) {
            if (is_array($_POST[$parameter])) {
                $request = array();

                foreach ($_POST[$parameter] as $param) {
                    $request[] = htmlspecialchars(addslashes(trim($param)));
                }

                return $request;
            }

            return htmlspecialchars(addslashes(trim($_POST[$parameter])));
        }

        return false;
    }

    public function delete($parameter = null)
    {
        // $params = file_get_contents('php://input');
        // echo $params;
        // echo '###';
        // echo 'POST-'.$parameter.'-|';
        // echo implode($parameter);
        // echo 'GET-'.$_GET.'-|';
        // echo implode($_GET);
        // echo '###';
    }

}

?>