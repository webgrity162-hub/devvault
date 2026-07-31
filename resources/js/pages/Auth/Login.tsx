import { useForm } from '@inertiajs/react';
import { FormEvent } from 'react';

export default function Login() {
  const { data, setData, post, processing, errors } = useForm({
    email: '',
    password: '',
    remember: false,
  });

  function submit(e: FormEvent) {
    e.preventDefault();
    post('/login');
  }

  return (
    <div className="flex min-h-screen items-center justify-center bg-gray-50">
      <form onSubmit={submit} className="w-full max-w-sm rounded-lg bg-white p-8 shadow">
        <h1 className="mb-6 text-xl font-bold text-gray-800">Sign in to DevVault</h1>

        <div className="mb-4">
          <label className="mb-1 block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            value={data.email}
            onChange={(e) => setData('email', e.target.value)}
            className="w-full rounded border border-gray-300 px-3 py-2 text-sm"
          />
          {errors.email && <p className="mt-1 text-sm text-red-600">{errors.email}</p>}
        </div>

        <div className="mb-6">
          <label className="mb-1 block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            value={data.password}
            onChange={(e) => setData('password', e.target.value)}
            className="w-full rounded border border-gray-300 px-3 py-2 text-sm"
          />
        </div>

        <button
          type="submit"
          disabled={processing}
          className="w-full rounded bg-blue-600 py-2 text-sm font-semibold text-white hover:bg-blue-700 disabled:opacity-50"
        >
          {processing ? 'Signing in...' : 'Sign in'}
        </button>
      </form>
    </div>
  );
}