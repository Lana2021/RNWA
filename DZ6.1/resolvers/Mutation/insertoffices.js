const { GraphQLString, GraphQLInt } = require('graphql');
const { dbQuery } = require('../../database');
const { officesType } = require('../../types');

const insertoffices = {
  type: officesType,
  args: {
    officeCode: { type: GraphQLInt },
    city: { type: GraphQLString },
    phone: { type: GraphQLString },
    addressLine1: { type: GraphQLString },
    country: { type: GraphQLString },
    postalCode: { type: GraphQLString },
    territory: { type: GraphQLString }
  },
  async resolve(_, { officeCode, city, phone, addressLine1, country, postalCode, territory}){
    let res = await dbQuery(`insert into offices (officeCode, city, phone, addressLine1, country, postalCode, territory ) values (${officeCode}, '${city}', '${phone}', '${addressLine1}', '${country}', '${postalCode}', '${territory}');`);
    return {  officeCode, city, phone, addressLine1, country, postalCode, territory }
  }
};

module.exports = insertoffices;