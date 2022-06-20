const { GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { officesType } = require('../../types');

const fieldsoffices = {
    type: new GraphQLList(officesType),
    async resolve(_, {}){
      let res = await dbQuery(`SELECT * FROM offices`);
      return res;
    }
  };

module.exports = fieldsoffices;
