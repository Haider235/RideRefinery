@extends('layouts.frontend')

@section('title', 'Privacy Policy')

@section('content')
<div class="bg-light min-h-screen py-16">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-4xl font-bold text-dark mb-6">Privacy Policy for Ride Refinery</h1>
        <p class="text-gray-600 mb-6">
            At Ride Refinery, we value your privacy and are committed to protecting your personal information. 
            This policy explains what information we collect, how we use it, and your rights in relation to that information.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">1. Information We Collect</h2>
        <p class="text-gray-600 mb-4">We collect information to provide and improve our services to the heavy bike community. The types of information we collect include:</p>
        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
            <li><strong>Account Information:</strong> When you create an account, you provide us with personal details such as your name, email address, and a password.</li>
            <li><strong>Profile Information:</strong> You may choose to add more details to your profile, such as your location, the type of heavy bike you own, and your interests.</li>
            <li><strong>User-Generated Content:</strong> This includes any content you post on the platform, such as listings, photos, videos, reviews, and messages sent to other users.</li>
            <li><strong>Usage Information:</strong> We automatically collect data about your interactions with the platform, including your IP address, browser type, device information, pages you visit, and the time and date of your visits.</li>
            <li><strong>Location Information:</strong> With your permission, we may collect location data to help you find nearby services or other users.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-dark mb-3">2. How We Use Your Information</h2>
        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
            <li><strong>To Provide Our Services:</strong> We use your information to operate and maintain the platform, including displaying your listings, connecting you with other users, and enabling communication.</li>
            <li><strong>To Improve the Platform:</strong> We analyze usage data to understand how the platform is used, so we can fix bugs, add new features, and enhance the user experience.</li>
            <li><strong>To Ensure Safety and Security:</strong> We may use your information to detect and prevent fraud, spam, or other malicious activities, and to enforce our Terms and Conditions.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-dark mb-3">3. How We Share Your Information</h2>
        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
            <li><strong>With Other Users:</strong> Information you post in public areas of the platform, such as your profile, listings, or forum posts, is visible to other users.</li>
            <li><strong>With Third-Party Service Providers:</strong> We may share information with trusted third parties who perform services on our behalf, such as hosting, analytics, and customer support. These providers are bound by confidentiality agreements and are not permitted to use your information for any purpose other than providing their services.</li>
            <li><strong>For Legal Reasons:</strong> We may disclose your information if required by law or to protect our rights or the safety of other users.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-dark mb-3">4. Your Choices and Rights</h2>
        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
            <li><strong>Access and Correction:</strong> You can access and update your account and profile information at any time by logging in to your account.</li>
            <li><strong>Deletion:</strong> If you wish to delete your account, please contact us. We will make reasonable efforts to delete your personal information, though some data may be retained for a limited time for legal or administrative purposes.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-dark mb-3">5. Changes to this Policy</h2>
        <p class="text-gray-600 mb-6">
            We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting the new policy on the site. 
            Your continued use of the platform after the changes constitutes your acceptance of the revised policy.
        </p>

        <h2 class="text-2xl font-semibold text-dark mb-3">6. Contact Us</h2>
        <p class="text-gray-600 mb-6">
            If you have any questions about this Privacy Policy, please contact us.
        </p>

        <div class="mt-10 flex justify-end space-x-4">
            <a href="{{ url('/') }}" 
               class="px-6 py-3 bg-red-600 text-white font-semibold rounded-md shadow hover:bg-red-700 transition">
               Back to Home
            </a>
            <a href="{{ url('/shop') }}" 
               class="px-6 py-3 bg-gray-200 text-dark font-semibold rounded-md shadow hover:bg-gray-300 transition">
               Back to Shop
            </a>
        </div>
    </div>
</div>
@endsection
