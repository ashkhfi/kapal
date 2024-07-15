class User {
  final String nama;
  final String username;
  final String password;
  final int roleId;

  User({
    required this.nama,
    required this.username,
    required this.password,
    this.roleId = 2,
  });

  Map<String, dynamic> toJson() {
    return {
      'nama': nama,
      'username': username,
      'password': password,
      'role_id': roleId,
    };
  }
}
