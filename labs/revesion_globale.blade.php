//route web.php get post put delete RouteModuleBinding
Route::get('/etudiant/{etudiant:id}',[NomController::class,'nomf'])
->where('etudiant','\d+')
->name('etudiant.show');

//NomController
public class EtudiantController extends Controller{
    //findAll
    public function index(){
        $etudiants=Etudiant::all();
        return view('etudiants',compact('etudiants'));
    }
    //findById
    public function show(Etudiant etudiant){
        return view('etudiant',compact('etudiant'));
    }
    //pour l'ajoute 2 fonctions create pour afficher formulaire 2 pour sauvegarder store
    public function create(){
        return view('etudiantForm');
    }
    public function store(EtudiantRequest $request){
        Etudiant::create($request->validated());
        return redirect()->route('etudiants')->with('succes','created succefuly');
    }
    //supprimer
    public function destroy(Etudiant $etudiant){
        $etudiant->delete();
        return redirect()->route('etudiants')->with('succes','deleted succefuly');
    }
    //update
    public function edit(Etudiant $etudiant){
        return view('etudiantForm',compact('etudiant'));
    }
    public function update(EtudiantRequest $request,Etudiant $etudiant){
        $etudiant->fill($request->validated())->save();
        return redirect()->route('etudiants')->with('succes','created succefuly');
    }
}
//EtudiantRequest
class EtudiantRequest extends Request{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'nom'=>'required|string|max:50'
            'tele'=>'required|string|max:50|regex:/^[0-9\-]+$/'
        ]
    }
    public function messages(){
        return [
            'nom.required'=>'nom est requis',
        ]
    }
}
//php artisan make:mail ContactEmail
class ContactEmail extends Mailable{
    use Queueable,SerialisesModels;
    public $data;
    public function __construct(array $data){
        $this->data=$data;
    }
    public function envelope(){
        return new Envelope(
            from:new Adress('abde@gmail.com','abde'),
            subject('....'),
        );
    }
    public function content(){
        return new Content(
            view:'afficher_email'
            with: [
                'nom'=>$this->data['nom']

            ]
        );
    }
}
//formulaire
<!DOCTYPE html>
<html>
<head>
    <title>Contactez-nous</title>
</head>
<body>
    <h1>Formulaire de Contact</h1>
    <form action="{{ route('send.contact.email') }}" method="POST">
        @csrf
        <label>Nom :</label>
        <input type="text" name="name" required>
        <br>
        <label>Email :</label>
        <input type="email" name="email" required>
        <br>
        <label>Message :</label>
        <textarea name="message" required></textarea>
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
//Controller
class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function sendContactEmail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('admin@example.com')->send(new ContactEmail($data));

        return redirect()->back()->with('success', 'Email envoyé avec succès !');
    }
}


