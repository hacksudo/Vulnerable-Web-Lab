# Vulnerable-Web-Lab
# 🔓 Hacksudo Vulnerable Web Application Labs

Welcome to **Hacksudo Vulnerable Web Labs**, a purposely vulnerable PHP-based platform to practice **real-world security flaws** in JWT, Web, and API applications. Ideal for **CTF creators**, **bug bounty hunters**, **penetration testers**, and **students** learning OWASP vulnerabilities.

---

## 🌐 Hosted Labs

### 🔐 JWT Vulnerabilities

| Lab # | Title                                  | Description                           |
|-------|----------------------------------------|---------------------------------------|
| Lab 1 | Weak Secret Key (HS256)                | Forge JWT using weak secret           |
| Lab 2 | None Algorithm Bypass                  | Exploit `alg: none` flaw              |
| Lab 3 | RS256 to HS256 Confusion               | Trick RS256 validation with public key |
| Lab 4 | Hardcoded Secret in Code               | Extract secret from source            |
| Lab 5 | kid Header Injection                   | Manipulate JWT kid to access keys     |
| Lab 6 | Brute-force Weak Key                   | Brute force predictable secret        |
| Lab 7 | JWK Header Confusion                   | Inject key via JWK header             |

---

### 🌍 Web Vulnerabilities (OWASP Top 10)

| Lab # | Vulnerability                |
|-------|------------------------------|
| Lab 1 | SQL Injection                |
| Lab 2 | Cross-Site Scripting (XSS)   |
| Lab 3 | Cross-Site Request Forgery   |
| Lab 4 | Server-Side Request Forgery |
| Lab 5 | Local File Inclusion         |
| Lab 6 | Remote File Inclusion        |
| Lab 7 | Open Redirect                |
| Lab 8 | OS Command Injection         |

---

### 🔌 API Vulnerabilities (OWASP API Top 10)

| Lab # | API Flaw                                |
|-------|------------------------------------------|
| Lab 1 | Broken Object Level Authorization (BOLA) |
| Lab 2 | Broken Authentication                    |
| Lab 3 | Object Property Level Authorization      |
| Lab 4 | Unrestricted Resource Consumption        |
| Lab 5 | Broken Function Level Authorization      |
| Lab 6 | Access to Sensitive Business Flows       |
| Lab 7 | Unsafe API Consumption                   |
| Lab 8 | JWT Token Tampering                      |

---

## 🎯 Features

- 🔒 JWT & API token manipulation scenarios
- ⚙️ Realistic vulnerable code examples
- 🎨 Hacker-themed UI (Green/Red on Black)
- 📂 Organized by category (web, jwt, api)
- 🧪 Easily deployable on Apache/PHP server
- 🧾 BurpSuite/PortSwigger compatible

---

## 🚀 Getting Started

### Requirements
- PHP 7.x or later
- Apache or Nginx
- Git (for cloning repo)

### Installation
```bash
git clone https://github.com/hacksudo/Vulnerable-Web-Lab.git --> Download image
cd Vulnerable-Web-Lab 
sudo apt install apache2 --> install html serve 
sudo rm -rf /var/www/html --> remove junk files
sudo cp -r * /var/www/html/ --> copy paste our lab code 
sudo chmod 755 -r /var/www/html --> set permission
sudo chown -R www-data:www-data /var/www/html --> set ownership 
sudo service apache2 start --> start http server
Access http://127.0.0.1:80
```

## Lab Login
```bash
Username: admin
password: password
```

## 📬 Contact Me

Feel free to reach out for collaborations, training, security projects, or just to connect!

### 📧 Email
- [vishal@hacksudo.com](mailto:vishal@hacksudo.com)  
- [info@hacksudo.com](mailto:info@hacksudo.com)

### 📞 Phone
- [+91 7666625280](tel:+917666625280)

### 🌐 Website
- [https://hacksudo.com](https://hacksudo.com)

### 🌍 Social Media

- [![GitHub](https://img.shields.io/badge/GitHub-hacksudo-black?logo=github)](https://github.com/hacksudo)
- [![DockerHub](https://img.shields.io/badge/DockerHub-hacksudo-blue?logo=docker)](https://hub.docker.com/u/hacksudo)
- [![Medium](https://img.shields.io/badge/Medium-hacksudo.medium.com-black?logo=medium)](https://hacksudo.medium.com)
- [![LinkedIn](https://img.shields.io/badge/LinkedIn-realvilu-blue?logo=linkedin)](https://www.linkedin.com/in/realvilu)
- [![Instagram](https://img.shields.io/badge/Instagram-hacksudo-E4405F?logo=instagram)](https://instagram.com/hacksudo)

## 🧑‍💻 Authors
```bash
@Vishal Waghmare 
Hackshala – YouTube
```
