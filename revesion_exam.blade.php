// routes get put post delete           web.php
Route::get('profiles/{profile:id}',[ControllerName::class,'nomefunction'])
->where('profile','\d+')
->name('profiles.show');
                                        //Controller
class PrpfileController extends Controller
{
    //findAll
    public function index(){
        $profiles=Profiles::paginate(2);
        return view('nomPage',compact('profiles'));
    }
    //findById
    public function show(Profile $profile){
        return view('nomPage',compact('profile'));
    }
    //pour ajouter nous somme besoin de 2 fonction create pour créer formulaire vide et store pour enregestrer data à près le submite
    public function creat(){
        return view('nomPage');
    }
    public function store(ProfileRequest $request){
        $formfield=$request->validated();
        Profile::create($formfields);
        return redirect()->route('profiles.index')->with('success','Profile created successfully');
    }
    //pour supprimer deleteById
    public function destroy(Profile $profile){
        $profile->delete();
        return redirect()->route('profiles.index')->with('success','Profile deleted successfully');
    }
    //pour update nous somme besoin 2 fonctions l'un pour afficher old values and one to update
    public function edit(Profile $profile){
        return view('nomPage',compact('profile'));
    }
    public function update(ProfileRequest $request, Profile $profile){
        $formfields=$request->validated();
        $profile->fill($formfields)->save();
        return redirect()->route('profiles.index')->with('success','Profile updated successfully');
    }
}
                                //FormRequest
class ProfileRequest extends Request{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'nom' => 'required|string|mas:50',
            'email'=>'required|email|unique:profiles,email',
        ]
    }
    public function messages(){
        return [
            'nom.required'=>'Le nom est obligatoire',
        ]
    }
}
                    //migration
return new class extends Migration{
    public function up(){
        Schema::create('profile', function(Blueprint $table){
            $table->id();
            $table->string('nom',50)->unique();
        })
    }
    public function down(){
        dropIfExists('profile');
    }
}

            //affichage de tous les profiles dans un tableau
<x-master title="profiles">
    <table>
        <thead>
            <tr>
                <td>nom</td>
                <td>delete</td>
                <td>edite</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile )
            <tr>
                <td>{{$profile->nom}}</td>
                <td><form method="POST" action="{{route(profiles.destroy, $profile->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form></td>
                <td><a href="{{route('profiles.update',$profile->id)}}"></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-master>

            //ajouter profile
<x-master title="profiles">
    <form method="POST" action="{{route('profiles.store')}}">
        @csrf
        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" value="{{old('nom')}}">
            @error('nom')
                <div>{{$message}}</div>
            @enderror
        </div>
        <button type="submit">save</button>
    </form>
</x-master>


                        //modefier profile
<x-master title="profiles">
    <form method="POST" action="{{route('profiles.update')}}">
        @csrf
        @method('PUT')
        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" value="{{old('nom',$profile->nom)}}">
            @error('nom')
                <div>{{$message}}</div>
            @enderror
        </div>
        <button type="submit">save</button>
    </form>
</x-master>

            //email
class ContactEmail extends Mailable{
    use Queueable,SerializesModels;
    public $data;

    public function __construct(array $data){
        $this->data=$data;
    }
    public function enveloppe(){
        return new Envelope(
            from: new Adress('abde@gmail.com','abde' ),
            subject:'contact',
        );
    }
    public function content(){
        return new Content(
            view:'emails.contact',
            with:[
                'nom'=>$this->data['nom'],
            ]
        );
    }
    public function attachements(){
        return [
            Attachment::fromPath('path')->as('cv.pdf')->withMime('application/pdf'),
        ];
    }
}

dans le contreul pour envoyer l'email
public function sendContactEmail(Request $request)
{
    // Récupérer les données du formulaire
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Envoyer l'email
    Mail::to('administrateur@chezmoi.com')->send(new ContactEmail($data));

    // Rediriger vers une page de confirmation
    return view('confirm');
}

