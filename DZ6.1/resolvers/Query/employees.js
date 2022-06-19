const { GraphQLList } = require('graphql');
const { dbQuery } = require('../../database');
const { employeesType } = require('../../types');

const fieldsemployees = {
  type: new GraphQLList(employeesType),
  async resolve(_, {}){
    let res = await dbQuery(`SELECT * FROM employees`);
    return res;
  }
};

module.exports = fieldsemployees;
