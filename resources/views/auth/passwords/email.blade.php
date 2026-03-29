<x-app-layout title="Reset Password">
<div class="min-h-screen flex items-center justify-center bg-[var(--bg-base)]">
    <div class="bg-[var(--bg-surface)] border border-[var(--border-default)] rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-[var(--text-primary)] mb-2 text-center">Reset Password</h2>
        <p class="text-sm text-[var(--text-secondary)] mb-6 text-center">Enter your email to receive a reset link</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-6">
                <label class="block text-sm text-[var(--text-secondary)] mb-1">Email</label>
                <input type="email" name="email" required autofocus class="w-full bg-[var(--bg-base)] border border-[var(--border-default)] rounded px-3 py-2 text-[var(--text-primary)] focus:border-[var(--accent)] focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-[var(--accent)] hover:bg-[#f59e0b] text-black font-semibold py-2 rounded transition-colors">Send Reset Link</button>
        </form>
    </div>
</div>
</x-app-layout>
