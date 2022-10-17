@extends('layouts.admin')

@section('pagetitle')
    About Contact
@endsection

@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-left-info">
        <h6 class="m-0 font-weight-bold text-primary">About this App</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <span><strong>Back up your contacts and sync them across all your devices</strong></span>
        <ul>
            <li>Safely back up the contacts in your Account to the cloud</li>
            <li>Access the contacts in your Account from any device</li>
            <li>Sync your contacts across all your devices</li>
            <li>Import contacts from your phone or another service</li>
            <li>Export contacts to your phone or another service</li>
            <li>View your contacts on any device</li>
            <li>Search your contacts</li>
            <li>Group your contacts</li>
            <li>Share your contacts</li>
            <li>Make calls and send texts</li>
            <li>Get notifications about important events</li>
        </ul>
        <span class="pt-2"><strong>Keep your contacts organized and up to date</strong></span>
        <ul>
            <li>View your contacts by account (e.g., work vs. personal)</li>
            <li>Easily add contacts and edit information like phone numbers, emails, and photos</li>
            <li>Get suggestions for adding new contacts, merging duplicates, and more</li>
        </ul>
        <hr>
        <span class="pt-2"><strong>Security Practices</strong></span>
        <ul>
            <li>
                <mark>Phonebook takes the security of your data seriously.</mark> We employ administrative, technical, and physical security measures to help protect your data. While we strive to protect your data, Phonebook cannot guarantee the security of any data you transmit to Phonebook and you do so at your own risk. Once we receive your data, we make reasonable efforts to ensure its security on our systems.
            </li>
            <li>
                Phonebook uses <mark>SSL (Secure Sockets Layer)</mark> to encrypt data transmissions between your device and our servers. We also use <mark>HTTPS (Hypertext Transfer Protocol Secure)</mark> to encrypt data transmissions between your browser and our servers. However, no method of transmission over the Internet, or method of electronic storage, is 100% secure. Therefore, while we strive to use commercially acceptable means to protect your data, we cannot guarantee its absolute security.
            </li>
        </ul>
        <hr>
        <span class="pt-2"><strong>Data Safety</strong></span>
        <ul>
            <li>
                Phonebook is a web application that stores your contacts in the cloud. Your contacts are encrypted and protected by your Account password. If you lose your phone or delete your contacts by accident, you can find them in your Account.
            </li>
            <li>
                <strong>Data Collection:</strong> Phonebook collects data to provide, maintain, protect, and improve its services, to develop new ones, and to protect Phonebook and its users. You provide some of this data directly, such as when you create a new Account. We get some of it by recording how you interact with our services by, for example, using technologies like cookies, and receiving error reports or usage data from software running on your device. Learn more about how Phonebook uses and protects your data.
            </li>
            <li>
                <strong>Data Sharing: </strong> <mark>Phonebook does not share your personal data with third parties for their own marketing purposes.</mark> Phonebook shares your personal data with third parties to help provide, maintain, protect, and improve its services, to develop new ones, and to protect Phonebook and its users. <mark>For example, we share data with vendors who help us provide our services.</mark> When we share data to provide services, we only share the data necessary to provide or improve that service, and we have contracts in place that require the recipient to both use that data only for that purpose and protect it at least as well as we do. We also share data to help detect and prevent spam, fraud, abuse, security risks, and technical issues that could harm Phonebook, our users, or the public. We also share data with third parties when we have a good-faith belief that access, use, preservation, or disclosure of the information is reasonably necessary to
                <ol>
                    <li>
                        <em>satisfy any applicable law, regulation, legal process or enforceable governmental request,</em>
                    </li>
                    <li>
                        <em>enforce applicable Terms of Service, including investigation of potential violations thereof,</em>
                    </li>
                    <li>
                        <em>detect, prevent, or otherwise address fraud, security or technical issues, or</em>
                    </li>
                    <li>
                        <em>protect against harm to the rights, property or safety of Phonebook, our users or the public as required or permitted by law.</em>
                    </li>
                </ol>
                Finally, Phonebook may share data with third parties for reasons not described in this statement, but we will provide notice before doing so and we will provide you with the ability to opt out of any further sharing unless we are required by law to share that data.
            </li>
        </ul>            
        <hr>
        <span class="pt-2"><strong>App design and developed by</strong></span>
        <ul>
            <li>Sayed Abu Zayed Hossain</li>
            <li>
                <a href="https://www.linkedin.com/in/zayed259/" target="_blank">LinkedIn</a>
            </li>
            {{-- facebook --}}
            <li>
                <a href="https://www.facebook.com/zayed59" target="_blank">Facebook</a>
            </li>
        </ul>
        <hr>
        {{-- app info --}}
        <span class="pt-2"><strong>App Info</strong></span>
        <ul>
            <li><strong>Version:</strong> 1.0.0</li>
            <li><strong>License:</strong> MIT</li>
            <li><strong>Author:</strong> Sayed Abu Zayed Hossain</li>
            <li><strong>Released on:</strong> 18th October, 2022</li>
            <li><strong>Updated on:</strong> 18th October, 2022</li>
        </ul>



    </div>
</div>

@endsection