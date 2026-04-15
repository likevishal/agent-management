"use client";

export default function Login() {
    return (
        <div style={{ padding: 20 }}>
            <h2>Login Page</h2>

            <input placeholder="Email" /> <br /><br />
            <input placeholder="Password" type="password" /> <br /> <br />

            <button>Login</button>
        </div>
    )
}