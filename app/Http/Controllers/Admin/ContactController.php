<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubmitReplyContact(Request $request,$id)
    {   
        $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'namthpttienthinh2@gmail.com';                     // SMTP username
                $mail->Password   = 'badboy1997';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
                $mail->setFrom('SMBUYCF@gmail.com', 'Smart Buy - Mua Sắm Thông Minh');
                $mail->addAddress($request->email);               // Name is optional
                $mail->addReplyTo('namthpttienthinh2@gmail.com', 'Information');
                $mail->isHTML(true);  
                $mail->CharSet = "UTF-8";
                $mail->Subject = $request->title;
                $mail->Body=$request->content;
                
                $mail->send();
                
            } catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        $reply= Contact::where('id',$id);
        $reply->update(['status'=>1]);
        return redirect()->route('dashboard/contacts.reply',$id)->with(["success"=>"Gửi thông tin phàn hồi thành công"]);
    }
    public function ReplyContact($id)
    {
        $reply= Contact::find($id);
        return view('dashboard.contacts.reply',['reply'=> $reply]);
    }
    public function create()
    {
        return view('dashboard.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $contact = Contact::create([
            'fullname' => $data['fullname'],
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => $data['status'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address']

        ]);


        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Contact::destroy($id);
        return redirect()->route('dashboard/contacts.index');
    }
}
