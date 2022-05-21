<?php

namespace App\Http\Controllers;


use App\Models\User;
use Inertia\Inertia;
use App\Models\Recharge;
use App\Models\Transfer;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Fun;
use Illuminate\Validation\Rule;
use App\Jobs\AlertTransferMailJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $urlLogo=url("storage/img/logo.png");
        $data_transfer=DB::table("transfers")->where("user_id",Auth::user()->id)->orderBy("created_at","desc")->get();
        
        return Inertia::render("Transfer/Index")->with([
            'urlLogo' => $urlLogo,
            'data_transfer'=>$data_transfer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urlLogo=url("storage/img/logo.png");
        $can_post_transfer=null;
        if (Gate::allows("can-post-transfer")) {
            $can_post_transfer=true;
        }else {
            $can_post_transfer=false;
        }
        return Inertia::render("Transfer/Create")->with([
            'urlLogo' => $urlLogo,
            'can_post_transfer'=>$can_post_transfer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countries =["Burkina faso","Côte d'ivoire","Cameroun","Centrafique","Congo-Brazzaville","Congo-Kinshasa", "Gabon","Ghana","Guinée","Mali","Togo"];
        $cities=["Afourar","Agadir","Agdz","Aghbala","Agni Izimmer","Agourai","Ahfir","Ain El Aouda","Ain Taoujdate","Ait Daoud","Ajdir‎","Akchour","Akka","Aklim","Aknoul‎","Al Aroui","Al Hoceïma‎","Alnif","Amalou Ighriben","Amizmiz","Anzi","Aoufous","Aoulouz","Aourir","Arazane","Arbaoua","Arfoud","Assa","Assahrij","Assilah","Awsard","Azemmour","Azilal","Azrou","Aïn Bni Mathar","Aïn Cheggag","Aïn Dorij","Aïn Erreggada","Aïn Harrouda","Aïn Jemaa","Aïn Karma","Aïn Leuh","Aït Attab","Aït Baha","Aït Boubidmane","Aït Hichem‎","Aït Iaâza","Aït Ishaq","Aït Majden","Aït Melloul","Aït Ourir","Aït Yalla","Bab Berred","Bab Taza","Bejaâd","Ben Ahmed","Ben Guerir","Ben Sergao","Ben Taïeb","Ben Yakhlef","Beni Ayat","Benslimane","Berkane","Berrechid","Bhalil","Bin elouidane","Biougra","Bir Jdid","Bni Ansar","Bni Bouayach‎","Bni Chiker","Bni Drar","Bni Hadifa‎","Bni Tadjite","Bouanane","Bouarfa","Boudnib","Boufakrane","Bouguedra","Bouhdila","Bouizakarne","Boujdour‎","Boujniba","Boulanouare","Boulemane","Boumalne-Dadès","Boumia","Bouskoura","Bouznika","Bradia","Brikcha","Bzou","Béni Mellal","Casablanca","Chefchaouen","Chichaoua","Dar Bni Karrich","Dar Chaoui","Dar El Kebdani","Dar Gueddari","Dar Oulad Zidouh","Dcheira El Jihadia","Debdou","Demnate","Deroua","Douar Kannine","Dra'a","Drargua","Driouch","Echemmaia","El Aïoun Sidi Mellouk","El Borouj","El Gara","El Guerdane","El Hajeb","El Hanchane","El Jadida","El Kelaâ des Sraghna","El Ksiba","El Marsa‎","El Menzel","El Ouatia","Elkbab","Er-Rich","Errachidia","Es-Semara","Essaouira","Fam El Hisn","Farkhana","Figuig","Fnideq","Foum Jamaa","Foum Zguid","Fquih Ben Salah","Fraïta","Fès","Gardmit","Ghafsai‎","Ghmate","Goulmima","Gourrama","Guelmim","Guercif‎","Gueznaia","Guigou","Guisser","Had Bouhssoussen","Had Kourt","Haj Kaddour","Harhoura","Harte Lyamine","Hattane","Hrara","Ida Ougnidif","Ifrane","Ifri","Igdamen","Ighil n'Oumgoun","Ighoud","Ighounane","Ihddaden","Imassine","Imintanoute","Imouzzer Kandar","Imouzzer Marmoucha","Imzouren‎","Inahnahen‎","Inezgane","Irherm","Issaguen (Ketama)‎","Itzer","Jamâat Shaim","Jaâdar","Jebha","Jerada","Jorf","Jorf El Melha","Jorf Lasfar","Karia","Karia (El Jadida)‎","Karia Ba Mohamed‎","Kariat Arekmane","Kasba Tadla","Kassita","Kattara","Kehf Nsour","Kelaat-M'Gouna","Kerouna","Kerrouchen","Khemis Zemamra","Khenichet","Khouribga","Khémis Sahel","Khémisset","Khénifra","Ksar El Kébir","Kénitra","Laaounate","Laayoune‎","Lakhsas","Lakhsass","Lalla Mimouna","Lalla Takerkoust","Larache","Laâtamna","Loudaya","Loulad","Lqliâa","Lâattaouia","M'diq","M'haya","M'rirt","M'semrir","Madagh","Marrakech","Martil","Massa (Maroc)","Mechra Bel Ksiri","Megousse","Mehdia","Meknès‎","Midar","Midelt","Missour","Mohammadia","Moqrisset","Moulay Abdallah","Moulay Ali Cherif","Moulay Bouazza","Moulay Bousselham","Moulay Brahim","Moulay Idriss Zerhoun","Moulay Yaâcoub","Moussaoua","MyAliCherif","Mzouda","Médiouna","N'Zalat Bni Amar","Nador","Naima","Oualidia","Ouaouizeght","Ouaoumana","Ouarzazate","Ouazzane","Oued Amlil‎","Oued Heimer","Oued Ifrane","Oued Laou","Oued Rmel","Oued Zem","Oued-Eddahab","Oujda","Oulad Abbou","Oulad Amrane","Oulad Ayad","Oulad Berhil","Oulad Frej","Oulad Ghadbane","Oulad H'Riz Sahel","Oulad M'Barek","Oulad M'rah","Oulad Saïd","Oulad Sidi Ben Daoud","Oulad Teïma","Oulad Yaich","Oulad Zbair‎","Ouled Tayeb","Oulmès","Ounagha","Outat El Haj","Point Cires","Rabat","Ras El Aïn","Ras El Ma","Ribate El Kheir","Rissani","Rommani","Sabaa Aiyoun","Safi","Salé","Sarghine","Saïdia","Sebt El Maârif","Sebt Gzoula","Sebt Jahjouh","Selouane","Settat","Sid L'Mokhtar","Sid Zouin","Sidi Abdallah Ghiat","Sidi Addi","Sidi Ahmed","Sidi Ali Ban Hamdouche","Sidi Allal El Bahraoui","Sidi Allal Tazi","Sidi Bennour","Sidi Bou Othmane","Sidi Boubker","Sidi Bouknadel","Sidi Bouzid","Sidi Ifni","Sidi Jaber","Sidi Kacem","Sidi Lyamani","Sidi Mohamed ben Abdallah el-Raisuni","Sidi Rahhal","Sidi Rahhal Chataï","Sidi Slimane","Sidi Slimane Echcharaa","Sidi Smaïl","Sidi Taibi","Sidi Yahya El Gharb","Skhinate","Skhirate","Skhour Rehamna","Skoura","Smimou","Soualem","Souk El Arbaa","Souk Sebt Oulad Nemma","Stehat","Séfrou","Tabounte","Tafajight","Tafetachte","Tafraout","Taghjijt","Taghzout","Tagzen","Tahannaout","Tahla‎","Tala Tazegwaght‎","Taliouine","Talmest","Talsint","Tamallalt","Tamanar","Tamansourt","Tamassint‎","Tamegroute","Tameslouht","Tamesna","Tamraght","Tan-Tan","Tanalt","Tanger‎","Tanoumrite Nkob Zagora","Taounate‎","Taourirt","Taourirt ait zaghar","Tarfaya‎","Targuist‎","Taroudannt","Tata","Taza‎","Taïnaste‎","Temsia","Tendrara","Thar Es-Souk‎","Tichoute","Tiddas","Tiflet","Tifnit","Tighassaline","Tighza","Timahdite","Tinejdad","Tisgdal","Tissa‎","Tit Mellil","Tizguite","Tizi Ouasli‎","Tiznit","Tiztoutine","Touarga","Touima","Touissit","Toulal","Toundoute","Tounfite","Témara","Tétouan‎","Youssoufia","Zag","Zagora","Zaouia d'Ifrane","Zaouïat Cheikh","Zaïda","Zaïo","Zeghanghane","Zeubelemok","Zinat"];
        $data =$request->validate([
              "option"=>["required","boolean"],
              "country_fixed"=>["required",Rule::in("Maroc")],
              "country_selected"=>["required",Rule::in($countries)],
              "city_selected"=>["required",Rule::in($cities)],
              "amount"=>["required","gt:0"],
              "phone"=>["required",'regex:/[0-9]{10}/',"size:10"]
        ]);
       Arr::set($data,"currency",Fun::GetCurrency($data["option"],$data["country_selected"]));
       Arr::set($data,"status","progressing");
       Arr::set($data,"user_id",Auth::user()->id);
       $data["country_fixed"] = "Maroc";
       Transfer::create($data);
       $urlLogo=url("storage/img/logo.png"); // get url logo 
       $data_transfer=Transfer::all()->where("user_id",Auth::user()->id); // get data transfer
       
       Fun::DecrementAccount(10); // decrement account
       return Inertia::render("Transfer/Index")->with([
           'urlLogo' => $urlLogo,
           "SuccessfulTransfer"=>true,
           'data_transfer'=>$data_transfer
       ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Transfer::findOrFail($id);
        $urlLogo=url("storage/img/logo.png");
        return Inertia::render("Transfer/Show")->with([
            "urlLogo"=>$urlLogo,
            "data"=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_phone(int $id)
    {
        $urlLogo=url("storage/img/logo.png");
        $get_phone=null;
        if (Gate::allows("can-post-transfer")) {
            $get_transfer_data=Transfer::findOrFail($id);
            Fun::ChangeStatus($id,"finished"); // change transfer status 
            $get_phone=$get_transfer_data["phone"];
            Fun::DecrementAccount(10); // decrement account
            $author_transfer_email=User::find($get_transfer_data["user_id"]); // get email of author transfer
            AlertTransferMailJob::dispatch($author_transfer_email["email"]); // sending alert  email   
        }else {
            $get_phone=null;
        }
         return Inertia::render("Transfer/ShowPhone",[
            "urlLogo"=>$urlLogo,
            "get_phone"=>$get_phone
         ]);
    }

}
