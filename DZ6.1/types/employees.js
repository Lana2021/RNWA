const { GraphQLObjectType, GraphQLInt, GraphQLString, GraphQLList } = require('graphql');
const { dbQuery } = require('../database');
const officesType = require('./offices');

const employeesType = new GraphQLObjectType({
  name: 'employees',
  fields:() => (
    {
    employeeNumber: { type: GraphQLInt },
    lastName: { type: GraphQLString },
    firstName: { type: GraphQLString },
    extension: { type: GraphQLString },
    email: { type: GraphQLString },
    offices: { 
        type: officesType,
        resolve: async (employees) => {
          let res = await dbQuery(`SELECT * FROM offices WHERE officeCode = ${parseInt(employees.officeCode)}`);
          return res[0];
        }
      },
    reportsTo: { type: GraphQLString },
    jobTitle: { type: GraphQLString },
    }
  ) 
});

module.exports = employeesType;