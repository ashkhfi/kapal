class Jadwal {
  final String id;
  final String hari;
  final String tanggal;
  final String bulan;
  final String tahun;
  final String pelabuhan;
  final String kapal;

  Jadwal({
    required this.id,
    required this.hari,
    required this.tanggal,
    required this.bulan,
    required this.tahun,
    required this.pelabuhan,
    required this.kapal,
  });

  factory Jadwal.fromJson(Map<String, dynamic> json) {
    return Jadwal(
      id: json['Id'],
      hari: json['Hari'],
      tanggal: json['Tanggal'],
      bulan: json['Bulan'],
      tahun: json['Tahun'],
      pelabuhan: json['Pelabuhan'],
      kapal: json['Kapal'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'Id': id,
      'Hari': hari,
      'Tanggal': tanggal,
      'Bulan': bulan,
      'Tahun': tahun,
      'Pelabuhan': pelabuhan,
      'Kapal': kapal,
    };
  }
}
