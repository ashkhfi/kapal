class Tiket {
  final String Id; // Mengubah Id ke String
  final String dataPenumpang;
  final String pelabuhanAsal;
  final String pelabuhanTujuan;
  final String kapal;
  final String hargaTiket; // Mengubah hargaTiket ke String
  final String idUser;
  final String status;
  final String anak;
  final String dewasa;
  final String motor;
  final String mobil;
  final String tanggal;

  Tiket({
    required this.Id,
    required this.dataPenumpang,
    required this.pelabuhanAsal,
    required this.pelabuhanTujuan,
    required this.kapal,
    required this.hargaTiket,
    required this.idUser,
    required this.status,
    required this.anak,
    required this.dewasa,
    required this.motor,
    required this.mobil,
    required this.tanggal,
  });

  factory Tiket.fromJson(Map<String, dynamic> json) {
    return Tiket(
      Id: json['Id'].toString(),
      dataPenumpang: json['Data_penumpang'],
      pelabuhanAsal: json['Pelabuhan_asal'],
      pelabuhanTujuan: json['Pelabuhan_tujuan'],
      kapal: json['Kapal'],
      hargaTiket: json['Harga_tiket'].toString(),
      idUser: json['id_user'],
      status: json['status'],
      anak: json['Anak'],
      dewasa: json['Dewasa'],
      motor: json['Motor'],
      mobil: json['Mobil'],
      tanggal: json['Tanggal'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'Id': Id,
      'Data_penumpang': dataPenumpang,
      'Pelabuhan_asal': pelabuhanAsal,
      'Pelabuhan_tujuan': pelabuhanTujuan,
      'Kapal': kapal,
      'Harga_tiket': hargaTiket,
      'id_user': idUser,
      'status': status,
      'Anak': anak,
      'Dewasa': dewasa,
      'Motor': motor,
      'Mobil': mobil,
      'Tanggal': tanggal,
    };
  }
}
