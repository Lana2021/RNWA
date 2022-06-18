const { GraphQLObjectType } = require('graphql');
const insertUser = require('./insertUser');
const insertoffices = require('./insertoffices');
const updateemployees = require('./updateemployees');

const Mutation = new GraphQLObjectType({
  name: 'mutation',
  fields: {
    // Insert a new user record
    insertUser: insertUser,
    insertoffices: insertoffices,
    updateemployees: updateemployees
  }
});

module.exports = Mutation;
