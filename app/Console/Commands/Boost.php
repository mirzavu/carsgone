<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dealer;
use Log;

class Boost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:boost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute boost feed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set("max_execution_time",0);
        $starttime = "\nProgram Start time:" . date(DATE_RFC822);

        $xml_directory   = 'storage/feeds/boost/';
        $xml_filename = 'Export';
        $local_file = $xml_directory . $xml_filename . date("Y-m-d") . '.xml';

        $server_file = $xml_filename . '.xml';
        $ftp_server = 'ftp.boostmotorgroup.com';
        $ftp_user_name = 'carsgone';
        $ftp_user_pass = 'boost2carsgone';

        //exec("curl -u carsgone:boost2carsgone 'ftp://ftp.boostmotorgroup.com/Export.xml' -o ".$local_file);
        //exit;
        $xmlReader = new \XMLReader;
        $xmlReader->open($local_file);

        $province_hash = array(
            "AB" => "Alberta",
            "ON" => "Ontario",
            "NF" => "Newfoundland",
            "SK" => "Saskatchewan",
            "YK" => "Yukon",
            "NB" => "New Brunswick",
            "NS" => "Nova Scotia",
            "NT" => "North West Territories",
            "BC" => "British Columbia",
            "QC" => "Quebec",
            "MB" => "Manitoba",
            "PE" => "Prince Edward Island"
            );
        $id_maps = Dealer::select(array('id', 'partner_dealer_id'))->where('partner_id',2)->get();
        
        $feed_dealers = array();
        foreach ($id_maps as $value) {
            $feed_dealers[$value->partner_dealer_id] = $value->id;
        }
        $vehicle_cnt = 0;
        $vehicle_upd = 0;
        $dealer_cnt = 0;
        $abnormal_dealer ="";
        $abnormal_dealer_cnt = 0;
        $new_dealer_cnt=0;
        $new_dealers = "";

        while( $xmlReader->read() ) {

        //We've found a dealer in the XML stream and it's not an END_ELEMENT
            if($xmlReader->name == 'Dealership' && $xmlReader->nodeType == XMLReader::ELEMENT) {

                $xml = simplexml_load_string( $xmlReader->readOuterXML() );
                $dealer->dealer_name = $xml->Dealership_Name;
                $dealer->boost_id = (string) $xml->Dealership_Boost_ID;
                $dealer->address = $xml->Dealership_Address;
                $dealer->uri = $xml->Dealership_Website;
                $dealer->city = $xml->Dealership_City;
                $prov_abbr = (string) $xml->Dealership_Province;
                $dealer->province = $province_hash[$prov_abbr];
                $dealer->postal_code = $xml->Dealership_Postal;
                $dealer->phone = $xml->Dealership_Phone;
                $dealer->email = $xml->Dealership_Email;

                $csv_line = '';

                $exist_dealer = Dealer::where('partner_id',2)->where('partner_dealer_id',$dealer->boost_id)->first->get();
                dd($exist_dealer);
                if($exist_dealer){

                        $dealer->dealer_id = $exist_dealer->id;
                        $dealer->partner_id = $exist_dealer->partner_id;
                        $dealer->partner_dealer_id = $exist_dealer->partner_dealer_id;
                        echo "\nDealer Name found in DB: " . $dealer->dealer_name . ' : Dealer ID: '.$dealer->dealer_id."\n";
                        $dealer_cnt++;
                    //~ echo 'found Dealer '. $row['DealerName']."\n";
                    //~ echo 'Postal Code: ' . $row['PostalCode']." ".$row['lat']." ".$row['lng']."\n";
                        if((!isset($row['latitude']) || !isset($row['longitude'])) && isset($row['postal_code'])){
                            $query = "select Longitude, Latitude from data_postal where PostalCode = '" . str_replace(' ', '', $dealer->postal_code) ."'";
                            $result = mysql_query($query);
                            if($result){
                                $row = mysql_fetch_array($result);
                                if(isset($row['Longitude'])){
                                    $dealer->Longitude = $row['Longitude'];
                                    $lng = $row['Longitude'];
                                    $dealer->Latitude = $row['Latitude'];
                                    $lat = $row['Latitude'];
                                }
                            }
                        }elseif(isset($row['lat']) && isset($row['lng'])){
                            $dealer->Longitude = $row['lng'];
                            $dealer->Latitude = $row['lat'];
                        }
                        $lng = $dealer->Longitude;
                        $lat = $dealer->Latitude;
                        $out_string .= "found'\n";

                        $update_query = "update tblVehicle set status_id=2 where dealer_id =" . $dealer->dealer_id;
                        echo "\n\n $update_query \n\n";
                        mysql_query($update_query);
                    
                }else{
                //InsertDealer($mysqli,$dealer);
                    echo "\n\nno result\n\n";
                }

                $csv_line = ''; 
                if(array_key_exists($boost_id, $feed_dealers)){
                    $dealer->dealer_id = $feed_dealers[$boost_id];
                //~ fwrite($fh, $out_string);
                    $dealer_cnt++;
                }
            }
        }

    }
}
