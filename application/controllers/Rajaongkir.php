<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Rajaongkir
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Rajaongkir extends CI_Controller
{

  private $api_key = 'eeecfd98bdaca3ad126b996e256726c4';

  public function province()
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $array_response = json_decode($response, true);
      // echo '<pre>';
      // print_r($array_response['rajaongkir']['results']);
      // echo '</pre>';
      $data_province = $array_response['rajaongkir']['results'];
      echo "<option value = ''>" . elang('Choose') . "</option>";
      foreach ($data_province as $key => $value) {
        echo "<option value='" . $value['province'] . "' id_province='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
      }
    }
  }

  public function city()
  {

    $id_province_selected = $this->input->post('id_province');
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_province_selected,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $array_response = json_decode($response, true);
      // echo '<pre>';
      // print_r($array_response);
      // echo '</pre>';
      $data_city = $array_response['rajaongkir']['results'];
      echo "<option value = ''>" . elang('Choose') . "</option>";
      foreach ($data_city as $key => $value) {
        echo "<option value='" . $value['city_name'] . "' id_city='" . $value['city_id'] . "' >" . $value['city_name'] . "</option>";
      }
    }
  }

  public function shipping()
  {
    echo '<option value = "">' . elang('Choose') . '</option>';
    echo '<option value = "jne">JNE</option>';
    echo '<option value = "tiki">TIKI</option>';
    echo '<option value = "pos">Pos Indonesia</option>';
  }

  public function package()
  {
    $setting = $this->setting_model->getSetting();
    $id_sending_city = $setting->location;
    $shipping = $this->input->post('shipping');
    $id_city = $this->input->post('id_city');
    $weight = $this->input->post('weight');


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=" . $id_sending_city . "&destination=" . $id_city . "&weight=" . $weight . "&courier=" . $shipping . "",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $this->api_key",
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $array_response = json_decode($response, true);
      // echo '<pre>';
      // print_r($array_response['rajaongkir']['results'][0]['costs']);
      // echo '</pre>';
      $data_package = $array_response['rajaongkir']['results'][0]['costs'];
      echo "<option value = ''>" . elang('Choose') . "</option>";
      foreach ($data_package as $key => $value) {
        echo "<option value='" . $value['service'] . "' shipping_cost='" . $value['cost'][0]['value'] . "' estimation = '" . $value['cost'][0]['etd'] . "'>";
        echo $value['description'] . " - IDR " . number_format($value['cost'][0]['value']) . " - " . $value['cost'][0]['etd'] . " " . elang('Day');
        echo "</option>";
      }
    }
  }
}


/* End of file Rajaongkir.php */
/* Location: ./application/controllers/Rajaongkir.php */