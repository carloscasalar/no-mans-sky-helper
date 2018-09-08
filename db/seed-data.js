db.getSiblingDB('nmsh').createCollection('delete_me');

db.getSiblingDB('nmsh')
  .createUser(
  {
    user: "nmsh",
    pwd: "1234",
    roles: [ {db: "nmsh", role:"readWrite"} ]
  }
);
