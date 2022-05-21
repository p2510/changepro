<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
       $urlLogo=url("storage/img/logo.png");
        
        return Inertia::render('Auth/Register')->with(['urlLogo'=>$urlLogo]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        // lists countries  and cities 
        $countries =[  "Burkina faso","Côte d'ivoire","Sénégal","Cameroun","Centrafique","Congo-Brazzaville","Congo-Kinshasa", "Gabon","Ghana","Guinée","Mali","Togo"];
        $cities=["Afourar","Agadir","Agdz","Aghbala","Agni Izimmer","Agourai","Ahfir","Ain El Aouda","Ain Taoujdate","Ait Daoud","Ajdir‎","Akchour","Akka","Aklim","Aknoul‎","Al Aroui","Al Hoceïma‎","Alnif","Amalou Ighriben","Amizmiz","Anzi","Aoufous","Aoulouz","Aourir","Arazane","Arbaoua","Arfoud","Assa","Assahrij","Assilah","Awsard","Azemmour","Azilal","Azrou","Aïn Bni Mathar","Aïn Cheggag","Aïn Dorij","Aïn Erreggada","Aïn Harrouda","Aïn Jemaa","Aïn Karma","Aïn Leuh","Aït Attab","Aït Baha","Aït Boubidmane","Aït Hichem‎","Aït Iaâza","Aït Ishaq","Aït Majden","Aït Melloul","Aït Ourir","Aït Yalla","Bab Berred","Bab Taza","Bejaâd","Ben Ahmed","Ben Guerir","Ben Sergao","Ben Taïeb","Ben Yakhlef","Beni Ayat","Benslimane","Berkane","Berrechid","Bhalil","Bin elouidane","Biougra","Bir Jdid","Bni Ansar","Bni Bouayach‎","Bni Chiker","Bni Drar","Bni Hadifa‎","Bni Tadjite","Bouanane","Bouarfa","Boudnib","Boufakrane","Bouguedra","Bouhdila","Bouizakarne","Boujdour‎","Boujniba","Boulanouare","Boulemane","Boumalne-Dadès","Boumia","Bouskoura","Bouznika","Bradia","Brikcha","Bzou","Béni Mellal","Casablanca","Chefchaouen","Chichaoua","Dar Bni Karrich","Dar Chaoui","Dar El Kebdani","Dar Gueddari","Dar Oulad Zidouh","Dcheira El Jihadia","Debdou","Demnate","Deroua","Douar Kannine","Dra'a","Drargua","Driouch","Echemmaia","El Aïoun Sidi Mellouk","El Borouj","El Gara","El Guerdane","El Hajeb","El Hanchane","El Jadida","El Kelaâ des Sraghna","El Ksiba","El Marsa‎","El Menzel","El Ouatia","Elkbab","Er-Rich","Errachidia","Es-Semara","Essaouira","Fam El Hisn","Farkhana","Figuig","Fnideq","Foum Jamaa","Foum Zguid","Fquih Ben Salah","Fraïta","Fès","Gardmit","Ghafsai‎","Ghmate","Goulmima","Gourrama","Guelmim","Guercif‎","Gueznaia","Guigou","Guisser","Had Bouhssoussen","Had Kourt","Haj Kaddour","Harhoura","Harte Lyamine","Hattane","Hrara","Ida Ougnidif","Ifrane","Ifri","Igdamen","Ighil n'Oumgoun","Ighoud","Ighounane","Ihddaden","Imassine","Imintanoute","Imouzzer Kandar","Imouzzer Marmoucha","Imzouren‎","Inahnahen‎","Inezgane","Irherm","Issaguen (Ketama)‎","Itzer","Jamâat Shaim","Jaâdar","Jebha","Jerada","Jorf","Jorf El Melha","Jorf Lasfar","Karia","Karia (El Jadida)‎","Karia Ba Mohamed‎","Kariat Arekmane","Kasba Tadla","Kassita","Kattara","Kehf Nsour","Kelaat-M'Gouna","Kerouna","Kerrouchen","Khemis Zemamra","Khenichet","Khouribga","Khémis Sahel","Khémisset","Khénifra","Ksar El Kébir","Kénitra","Laaounate","Laayoune‎","Lakhsas","Lakhsass","Lalla Mimouna","Lalla Takerkoust","Larache","Laâtamna","Loudaya","Loulad","Lqliâa","Lâattaouia","M'diq","M'haya","M'rirt","M'semrir","Madagh","Marrakech","Martil","Massa (Maroc)","Mechra Bel Ksiri","Megousse","Mehdia","Meknès‎","Midar","Midelt","Missour","Mohammadia","Moqrisset","Moulay Abdallah","Moulay Ali Cherif","Moulay Bouazza","Moulay Bousselham","Moulay Brahim","Moulay Idriss Zerhoun","Moulay Yaâcoub","Moussaoua","MyAliCherif","Mzouda","Médiouna","N'Zalat Bni Amar","Nador","Naima","Oualidia","Ouaouizeght","Ouaoumana","Ouarzazate","Ouazzane","Oued Amlil‎","Oued Heimer","Oued Ifrane","Oued Laou","Oued Rmel","Oued Zem","Oued-Eddahab","Oujda","Oulad Abbou","Oulad Amrane","Oulad Ayad","Oulad Berhil","Oulad Frej","Oulad Ghadbane","Oulad H'Riz Sahel","Oulad M'Barek","Oulad M'rah","Oulad Saïd","Oulad Sidi Ben Daoud","Oulad Teïma","Oulad Yaich","Oulad Zbair‎","Ouled Tayeb","Oulmès","Ounagha","Outat El Haj","Point Cires","Rabat","Ras El Aïn","Ras El Ma","Ribate El Kheir","Rissani","Rommani","Sabaa Aiyoun","Safi","Salé","Sarghine","Saïdia","Sebt El Maârif","Sebt Gzoula","Sebt Jahjouh","Selouane","Settat","Sid L'Mokhtar","Sid Zouin","Sidi Abdallah Ghiat","Sidi Addi","Sidi Ahmed","Sidi Ali Ban Hamdouche","Sidi Allal El Bahraoui","Sidi Allal Tazi","Sidi Bennour","Sidi Bou Othmane","Sidi Boubker","Sidi Bouknadel","Sidi Bouzid","Sidi Ifni","Sidi Jaber","Sidi Kacem","Sidi Lyamani","Sidi Mohamed ben Abdallah el-Raisuni","Sidi Rahhal","Sidi Rahhal Chataï","Sidi Slimane","Sidi Slimane Echcharaa","Sidi Smaïl","Sidi Taibi","Sidi Yahya El Gharb","Skhinate","Skhirate","Skhour Rehamna","Skoura","Smimou","Soualem","Souk El Arbaa","Souk Sebt Oulad Nemma","Stehat","Séfrou","Tabounte","Tafajight","Tafetachte","Tafraout","Taghjijt","Taghzout","Tagzen","Tahannaout","Tahla‎","Tala Tazegwaght‎","Taliouine","Talmest","Talsint","Tamallalt","Tamanar","Tamansourt","Tamassint‎","Tamegroute","Tameslouht","Tamesna","Tamraght","Tan-Tan","Tanalt","Tanger‎","Tanoumrite Nkob Zagora","Taounate‎","Taourirt","Taourirt ait zaghar","Tarfaya‎","Targuist‎","Taroudannt","Tata","Taza‎","Taïnaste‎","Temsia","Tendrara","Thar Es-Souk‎","Tichoute","Tiddas","Tiflet","Tifnit","Tighassaline","Tighza","Timahdite","Tinejdad","Tisgdal","Tissa‎","Tit Mellil","Tizguite","Tizi Ouasli‎","Tiznit","Tiztoutine","Touarga","Touima","Touissit","Toulal","Toundoute","Tounfite","Témara","Tétouan‎","Youssoufia","Zag","Zagora","Zaouia d'Ifrane","Zaouïat Cheikh","Zaïda","Zaïo","Zeghanghane","Zeubelemok","Zinat"];
 
        $request->validate([
            'name' => ['required','string','max:255',"regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,255}$/u"],
            'surname' => ['required','string','max:255',"regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]{2,255}$/u"],
            'native_country' => ['required','string','max:255',Rule::in($countries)],
            'city' =>  ['required','string','max:255',Rule::in($cities)],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'native_country' => $request->native_country,
            'city' => $request->city,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
