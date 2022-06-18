const { GraphQLString, GraphQLInt } = require('graphql');
const { dbQuery } = require('../../database');
const { employeesType } = require('../../types');

const updateemployees = {
  type: employeesType,
  args: {
    employeeNumber :{ type: GraphQLInt },
    lastName: { type: GraphQLString },
    firstName: { type: GraphQLString },
  },
  async resolve(_, {employeeNumber, lastName, firstName }){
    let res = await dbQuery(`update employees set lastName= "${lastName}", firstName= "${firstName}"  where employeeNumber = ${employeeNumber};`);
    return { emp_no, first_name, last_name }
  }
};

module.exports = updateemployees;