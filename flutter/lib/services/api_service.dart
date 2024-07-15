import 'dart:convert';
import 'package:flutter/scheduler.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

import '../models/jadwal_model.dart';
import '../models/tiket_model.dart';
import '../models/user_model.dart';
import '../pages/Jadwal.dart';

class ApiService {
  final String baseUrl;

  ApiService(this.baseUrl);

  Future<int> login(String username, String password) async {
    final String apiUrl = '$baseUrl/login/login';

    final response = await http.post(
      Uri.parse(apiUrl),
      body: jsonEncode({
        'username': username,
        'password': password,
      }),
      headers: {
        'Content-Type': 'application/json',
      },
    );

    if (response.statusCode == 200) {
      // Berhasil login, parsing respons JSON
      Map<String, dynamic> jsonResponse = jsonDecode(response.body);

      // Ambil ID pengguna dari respons
      String userId = jsonResponse['user']['id'];

      // Simpan ID pengguna ke SharedPreferences
      SharedPreferences prefs = await SharedPreferences.getInstance();
      await prefs.setString('userId', userId);

      // Membaca kembali nilai userId dari SharedPreferences
      String? storedUserId = prefs.getString('userId');

      // Menampilkan hasil penyimpanan
      if (storedUserId != null && storedUserId == userId) {
        print('userId telah tersimpan dengan benar: $storedUserId');
      } else {
        print('Gagal menyimpan userId.');
      }

      // Kembalikan status code 200 untuk indikasi login berhasil
      return 200;
    } else {
      // Gagal login, kembalikan status code dari respons
      return response.statusCode;
    }
  }

  Future<int> registerUser(User user) async {
    final String apiUrl = '$baseUrl/login/register';

    Map<String, dynamic> userData = {
      'nama': user.nama,
      'username': user.username,
      'password': user.password,
    };
    String jsonBody = jsonEncode(userData);
    final response = await http.post(
      Uri.parse(apiUrl),
      body: jsonBody,
      headers: {
        'Content-Type': 'application/json',
      },
    );

    return response.statusCode;
  }

  Future<List<Jadwal>> getJadwal() async {
    final String apiUrl = '$baseUrl/jadwal/getJadwal';
    final response = await http.get(
      Uri.parse(apiUrl),
      headers: {
        'Content-Type': 'application/json',
      },
    );

    if (response.statusCode == 200) {
      List<dynamic> decodedJson = jsonDecode(response.body);
      List<Jadwal> jadwalList =
          decodedJson.map((item) => Jadwal.fromJson(item)).toList();
      return jadwalList;
    } else {
      throw Exception('Failed to load jadwal');
    }
  }

  Future<List<Tiket>> getTiket() async {
    final String apiUrl = '$baseUrl/tiket/getTiket';
    final response = await http.get(
      Uri.parse(apiUrl),
      // Hapus header Content-Type untuk request GET
    );

    if (response.statusCode == 200) {
      List<dynamic> decodedJson = jsonDecode(response.body);
      List<Tiket> jadwalList =
          decodedJson.map((item) => Tiket.fromJson(item)).toList();
      return jadwalList;
    } else {
      throw Exception('Failed to load jadwal');
    }
  }

  Future<int> createTiket(Map<String, dynamic> tiketData) async {
    final url = Uri.parse('$baseUrl/tiket/create');
    final headers = {'Content-Type': 'application/json'};
    final body = json.encode(tiketData);

    final response = await http.post(url, headers: headers, body: body);

    return response.statusCode;
  }
}
