# Gunakan base image Python 3.9
FROM python:3.9

# Set direktori kerja
WORKDIR /app

# Salin file requirements.txt ke dalam container
COPY requirements.txt .

# Install dependensi Python
RUN pip install -r requirements.txt

# Salin seluruh file proyek ke dalam kontainer
COPY . .

# Eksekusi aplikasi Flask
CMD ["python", "app.py"]