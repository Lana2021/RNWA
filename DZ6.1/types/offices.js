const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');

const officesType = new GraphQLObjectType({
  name: 'offices',
  fields: {
    officeCode: { type: GraphQLInt },
    city: { type: GraphQLString },
    phone: { type: GraphQLString },
    addressLine1: { type: GraphQLString },
    addressLine2: { type: GraphQLString },
    state: { type: GraphQLString },
    country: { type: GraphQLString },
    postalCode: { type: GraphQLString },
    territory: { type: GraphQLString },
  }
});

module.exports = officesType;